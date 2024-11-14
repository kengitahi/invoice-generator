<?php

namespace App\Traits;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasPDFFile
{
    private function createPDF($invoice)
    {
        //get the Invoice to use
        $pdfInvoice = Invoice::where('invoice_number', $invoice->invoice_number)
            ->with('items')
            ->first()
            ->toArray();

        //Create the invoice PDF
        $pdf = Pdf::loadView('livewire.pages.invoices.pdf', [
            'invoice' => $pdfInvoice,
        ])
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' => 150,
                'debugCss' => true,
            ]);

        //Create PDF name
        $filename = trim(
            'invoice_'.$invoice->invoice_number.'_'.time().'.pdf',
            '_'
        );

        //Save PDF file
        return $pdf->save(storage_path('app/private/invoices/'.$filename));
    }

    private function deletePDF(string $path, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->delete($path);
    }

    private function updatePDF(
        UploadedFile $newFile,
        ?string $oldFilePath,
        string $directory,
        string $prefix = '',
        string $disk = 'public'
    ): string {
        // Delete old file if it exists
        if ($oldFilePath) {
            $this->deleteFile($oldFilePath, $disk);
        }

        // Store new file
        return $this->storeFile($directory, $newFile, $prefix, $disk);
    }
}

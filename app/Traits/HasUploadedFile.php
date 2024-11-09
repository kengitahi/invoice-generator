<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasUploadedFile
{
    private function storeFile(
        string $directory,
        UploadedFile $file,
        string $prefix = '',
        string $disk = 'public'
    ): string {
        $extension = $file->getClientOriginalExtension();
        $filename = trim($prefix.'_'.time().'_'.uniqid(8).'.'.$extension, '_');

        return $file->storeAs($directory, $filename, $disk);
    }

    private function deleteFile(string $path, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->delete($path);
    }

    private function updateFile(
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

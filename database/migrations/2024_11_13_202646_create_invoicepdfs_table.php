<?php

use App\Models\Invoice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoice_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Invoice::class)->constrained()->onDelete('cascade');
            $table->string('pdf_name');
            $table->string('pdf_location');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoicepdfs');
    }
};

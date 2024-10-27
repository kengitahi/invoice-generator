<?php

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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            //Invoice details
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->text('invoice_terms')->nullable();
            $table->text('invoice_conditions')->nullable();
            $table->text('invoice_notes')->nullable();

            //Sender Details
            $table->string('sender_name');
            $table->string('sender_business_name')->nullable();
            $table->string('sender_email')->unique();
            $table->string('sender_tel');
            $table->string('sender_website')->nullable();
            $table->string('sender_business_number')->nullable();

            //Client Details
            $table->string('client_name');
            $table->string('client_business_number')->nullable();
            $table->string('client_email');
            $table->string('client_tel');

            //From calculations
            $table->decimal('grand_total', 15, 2);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

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
        Schema::create('drug_quotation', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id')->index();
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');

            $table->unsignedBigInteger('drug_id')->index();
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('restrict');

            $table->integer('quantity')->default(0);
            $table->decimal('amount',8,2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_quotation');
    }
};

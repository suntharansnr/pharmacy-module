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
        Schema::create('prescription_slot', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('prescription_id')->index();
            $table->foreign('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');

            $table->unsignedBigInteger('slot_id')->index();
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_slot');
    }
};

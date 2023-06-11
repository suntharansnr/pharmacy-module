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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->decimal('total',8,2)->default(0);

            $table->unsignedBigInteger('prescription_id')->index();
            $table->foreign('prescription_id')->references('id')->on('prescriptions')->onDelete('cascade');

            $table->string('status')->default(0)->comment(0,1,2);

            //pharmacy user id goes here
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};

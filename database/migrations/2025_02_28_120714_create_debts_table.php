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
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_information');
            $table->string('client_phone');
            $table->date('date');
            $table->double('amount');
            $table->string('image');
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->enum('recorded_by', ['jasur', 'nodira', 'hilola']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};

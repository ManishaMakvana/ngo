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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('email')->unique(); // Email address (unique)
            $table->string('teacher_name'); // Teacher's name
            $table->string('teacher_id')->unique(); // Teacher ID (unique)
            $table->string('password'); // Password (encrypted)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

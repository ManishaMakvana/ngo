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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('programid');
            $table->string('title');
            $table->string('username');
            $table->string('school');
            $table->string('activity_name');
            $table->integer('girls');
            $table->integer('boys');
            $table->string('teacher');
            $table->date('due_date');
            $table->text('basic_description');
            $table->text('google_photos')->nullable();
            $table->string('hero_pic')->nullable();
		 $table->string('status')->default('pending');
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('programid')->references('programid')->on('programs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};

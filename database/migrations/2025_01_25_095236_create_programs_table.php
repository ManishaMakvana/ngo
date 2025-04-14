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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('programid'); // Foreign Key
            $table->string('std', 50);
            $table->string('module_id', 50);
            $table->string('document_type');
            $table->string('title');
            $table->text('publish_link')->nullable();
            $table->text('presentation_link')->nullable();
            $table->text('youtube_voiceover')->nullable();
            $table->text('google_slide')->nullable();
            $table->text('worksheet')->nullable();
            $table->timestamps();
            
            // Fixed Foreign Key Reference
            $table->foreign('programid')->references('id')->on('users')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};

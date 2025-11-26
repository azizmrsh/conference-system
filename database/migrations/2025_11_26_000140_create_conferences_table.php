<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->integer('session_number')->nullable();
            $table->string('hijri_year', 20)->nullable();
            $table->integer('gregorian_year')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('venue_name_ar')->nullable();
            $table->string('venue_name_en')->nullable();
            $table->string('venue_address_ar', 512)->nullable();
            $table->string('venue_address_en', 512)->nullable();
            $table->text('themes')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->enum('status', ['planning','active','completed','archived'])->default('planning');
            $table->string('logo_path', 1024)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->index('gregorian_year');
            $table->index(['start_date','end_date']);
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};


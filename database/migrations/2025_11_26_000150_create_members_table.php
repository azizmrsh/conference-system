<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name_ar');
            $table->string('first_name_en')->nullable();
            $table->string('last_name_ar');
            $table->string('last_name_en')->nullable();
            $table->string('honorific_title_ar')->nullable();
            $table->string('honorific_title_en')->nullable();
            $table->string('academic_title_ar')->nullable();
            $table->string('academic_title_en')->nullable();
            $table->enum('type', ['working_member','correspondent_member','honorary_member','guest_speaker','staff','journalist']);
            $table->date('membership_date')->nullable();
            $table->foreignId('nationality_id')->nullable()->constrained('countries')->nullOnDelete();
            $table->string('passport_number', 100)->nullable();
            $table->date('passport_expiry')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 100)->nullable();
            $table->text('cv_text')->nullable();
            $table->string('photo_path', 1024)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};


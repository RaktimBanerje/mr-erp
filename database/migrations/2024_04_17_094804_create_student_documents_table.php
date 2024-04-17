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
        Schema::create('student_documents', function (Blueprint $table) {
            $table->id();
            $table->string('ten_class_marksheet')->nullable();
            $table->string('ten_class_admitcard')->nullable();
            $table->string('ten_class_registration')->nullable();
            $table->string('ten_class_certificate')->nullable();
            $table->string('twelve_class_marksheet')->nullable();
            $table->string('twelve_class_admitcard')->nullable();
            $table->string('twelve_class_registration')->nullable();
            $table->string('twelve_class_certificate')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('caste_certificate')->nullable();
            $table->string('school_leaving_certificate')->nullable();
            $table->string('wbjee_rank_card')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_documents');
    }
};

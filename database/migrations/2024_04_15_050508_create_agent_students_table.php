<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\College;
use App\Models\Course;
use App\Models\AcademySession;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agent_students', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->text('name');
            $table->date('dob');
            $table->text('phone');
            $table->text('additional_phone_no');
            $table->text('identity');
            $table->foreignIdFor(College::class);
            $table->foreignIdFor(Course::class);
            $table->foreignIdFor(AcademySession::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_students');
    }
};
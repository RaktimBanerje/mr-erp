<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AgentStudent;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('counsellings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AgentStudent::class);
            $table->float("proposed_fees", 11, 2);
            $table->float("asking_fees", 11, 2);
            $table->text("docs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counsellings');
    }
};

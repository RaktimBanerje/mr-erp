<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Payment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cheque_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Payment::class);
            $table->text("utr_no");
            $table->float("amount", 11, 2);
            $table->date("date");
            $table->text("medium");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheque_transfers');
    }
};

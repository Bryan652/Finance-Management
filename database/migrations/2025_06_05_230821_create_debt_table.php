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
        Schema::create('debt', function (Blueprint $table) {
            $table->string('amount')->required();
            $table->text('description')->nullable();
            $table->date('due_date')->nullable(); // for some credit cards that are needed to be paid
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending'); // if the credit card is paid then update the status
            $table->timestamp('paid_at')->nullable(); // When i paid it. Tanggalin ko siguro to kasi ma dedelete naman yung paid_at kapag bayad na
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debt');
    }
};

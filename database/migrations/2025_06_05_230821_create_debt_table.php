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
            $table->id();
            $table->string('currency')->default('PHP');
            $table->decimal('amount', 10, 2)->required();
            $table->text('description')->nullable();
            $table->date('due_date')->nullable(); // for some credit cards that are needed to be paid
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending'); // if the credit card is paid then update the status
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

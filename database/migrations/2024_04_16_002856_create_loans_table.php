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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('customer_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('coin_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->date('payment_start_date');
            $table->double('loan_amount');
            $table->double('interest_percentage');
            $table->integer('dues');
            $table->string('payment_methods');
            $table->double('value_per_fee');
            $table->double('interest_value');
            $table->double('total_value');
            $table->string('state');   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

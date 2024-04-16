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
        Schema::create('loans_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loans_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            
            $table->date('pay_day');
            $table->integer('dues');
            $table->double('fee_amount');
            $table->string('state'); 
            $table->date('date_paid');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans_details');
    }
};

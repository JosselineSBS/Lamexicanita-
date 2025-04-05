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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street', 50);
            $table->integer('internal_num')->nullable();
            $table->integer('external_num')->nullable();
            $table->string('neighborhood', 60)->nullable();
            $table->string('town', 60)->nullable();
            $table->string('state', 60)->nullable();
            $table->string('country', 60)->nullable();
            $table->integer('postal_code');
            $table->string('references', 100)->nullable()->default('Ninguna');
            $table->foreignId('client_id')->unsigned();

            
            $table->foreign('client_id')->references('id')->on('clients')->odDelete('cascade')->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

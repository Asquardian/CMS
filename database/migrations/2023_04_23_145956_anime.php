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
        Schema::create('anime', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->integer('studio');
            $table->date('date');
            $table->integer('rating')->default('0');
            $table->integer('votes')->default('0');
            $table->integer('state');
            $table->string('url')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime');
    }
};

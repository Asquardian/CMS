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
        Schema::create('user_info', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->default(1);
            $table->text('description')->default('');
            $table->json('wish')->nullable();
            $table->json('watch')->nullable();
            $table->json('finish')->nullable();
            $table->json('droped')->nullable();
            $table->json('rated')->nullable();
            $table->unsignedBigInteger('user');
            $table->timestamps();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_info');
    }
};

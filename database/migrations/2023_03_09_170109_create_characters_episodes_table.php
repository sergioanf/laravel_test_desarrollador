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
        Schema::create('characters_episodes', function (Blueprint $table) {
  
            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('episode_id');

            $table->foreign('character_id')->references('character_id')->on('characters')->onDelete('cascade');
            $table->foreign('episode_id')->references('episode_id')->on('episodes')->onDelete('cascade');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters_episodes');
    }
};
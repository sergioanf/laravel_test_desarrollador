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
        Schema::create('characters', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('gender', 10);
            $table->string('image', 250);
            $table->string('name', 50);
            $table->string('species', 20);
            $table->string('status', 20);
            $table->date('created')->default(date("Y-m-d"));
            $table->unsignedBigInteger('location_id')->default(null)->nullable();

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};

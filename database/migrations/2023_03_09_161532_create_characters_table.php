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
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('character_id')->unique();
            $table->string('gender', 10);
            $table->string('image', 50);
            $table->string('name', 50);
            $table->string('species', 20);
            $table->string('status', 20);
            $table->string('created', 20);
            $table->timestamps();


           // $table->string('location', 20);
           // $table->string('episode', 20);
           /*
           $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')
                ->references('id')
                ->on('personas')
                ->onDelete('cascade')
                ->onUpadte('cascade');
                //->onDelete('set_null');
            */
            
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

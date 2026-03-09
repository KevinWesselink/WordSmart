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
        Schema::create('wordsmart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wordsmart_list_id')->constrained('wordsmart_lists')->cascadeOnDelete();
            $table->string('left_word');
            $table->string('right_word');
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wordsmarts_items');
    }
};

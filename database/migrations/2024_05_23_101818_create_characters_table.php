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
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('race');
            $table->string('class');
            $table->string('background');
            $table->string('alignment');
            $table->integer('level')->default(1);
            $table->integer('armor_class')->default(10);
            $table->integer('max_hit_points')->default(10);
            $table->integer('speed')->default(30);
            $table->integer('hit_dice')->default(8);
            $table->enum('spellcasting_ability', ['intelligence', 'wisdom', 'charisma'])->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
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

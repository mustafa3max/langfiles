<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author')
                ->constrained('users', 'id')
                ->onUpdate('cascade');
            $table->string('title', 255)->require;
            $table->string('thumbnail')->require;
            $table->string('desc', 560)->require;
            $table->string('path')->require;
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contributors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 16)->require;
            $table->string('thumbnail')->default('/assets/images/logo.svg');
            $table->string('phone', 16)->nullable();
            $table->string('path_profile')->nullable();
            $table->string('title', 100)->require;
            $table->string('desc', 350)->require;
            $table->string('path_1')->nullable();
            $table->string('path_2')->nullable();
            $table->string('path_3')->nullable();
            $table->boolean('enabled')->default(false);
            $table->boolean('website')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contributors');
    }
};

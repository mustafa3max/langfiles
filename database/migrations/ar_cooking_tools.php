<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('ar_cooking_tools', function (Blueprint $table) {
            $table->id();
            $table->string('type', 32)->require;
            $table->string('language', 32)->require;
            $table->string('key', 50)->uniqid;
            $table->string('value', 255)->uniqid;
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ar_cooking_tools');
    }
};

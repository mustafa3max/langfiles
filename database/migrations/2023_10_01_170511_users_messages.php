<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_messages', function (Blueprint $table) {
            $table->id();
            $table->string('email')->require;
            $table->string('title', 255)->require;
            $table->string('message', 2550)->require;
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_messages');
    }
};

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
        Schema::create('en_person_names', function (Blueprint $table) {
            $table->id();
            $table->string('type', 32)->require;
            $table->string('language', 32)->require;
            $table->string('key', 50)->uniqid;
            $table->string('value', 255)->uniqid;
            $table->boolean('enabled')->default(false);
            $table->json('sections')->default(json_encode(['public']));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('en_video_editing_programs');
    }
};

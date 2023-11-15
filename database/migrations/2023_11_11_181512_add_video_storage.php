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
        Schema::create('video_storages', function(Blueprint $table) {
            $table->id();
            $table->foreignId('video_id');
            $table->string('vimeo_id')->nullable()->comment('vimeo_ids are videos/1234');
            $table->string('backblaze_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('video_storages');
    }
};

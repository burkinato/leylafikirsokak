<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('site_settings', function (Blueprint $table) {
        $table->id();
        $table->string('site_title')->nullable();
        $table->string('site_slogan')->nullable();
        $table->string('site_logo')->nullable();
        $table->string('site_favicon')->nullable();
        $table->string('default_language')->default('tr');
        $table->string('timezone')->default('GMT+3');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};

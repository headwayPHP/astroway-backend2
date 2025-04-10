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
        Schema::create('remote_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->date('birthdate');
            $table->time('birthtime');
            $table->string('birthplace');
            $table->string('city');
            $table->string('address');
            $table->string('google_location');
            $table->string('layout_map');
            $table->string('compass_reading');
            $table->string('property_video')->nullable();
            $table->text('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remote_bookings');
    }
};
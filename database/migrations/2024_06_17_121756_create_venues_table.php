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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('venue_title')->nullable;
            $table->string('image')->nullable;
            $table->string('venue_address')->nullable;
            $table->string('venue_town')->nullable;
            $table->string('venue_postcode')->nullable;
            $table->string('venue_city')->nullable;
            $table->string('venue_size')->nullable;
            $table->longText('venue_availability')->nullable;
            $table->longText('description')->nullable;
            $table->string('price')->nullable;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};

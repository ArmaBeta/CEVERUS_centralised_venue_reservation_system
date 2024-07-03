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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('venue_id')->nullable();
            $table->string('booking_name')->nullable();
            $table->string('booking_email')->nullable();
            $table->string('booking_phone')->nullable();
            $table->string('booking_start_date')->nullable();
            $table->string('booking_end_date')->nullable();
            $table->longText('booking_purpose')->nullable();
            $table->integer('booking_no_participants')->nullable();
            $table->string('booking_status')->default('pending');
            $table->longText('booking_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

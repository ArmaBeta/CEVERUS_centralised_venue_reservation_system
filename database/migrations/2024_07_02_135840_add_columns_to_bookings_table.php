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
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('booking_status');
            $table->string('booking_payment_method')->nullable()->after('user_id');
            $table->decimal('booking_total', 10, 2)->nullable()->after('booking_payment_method');
            $table->integer('booking_days')->nullable()->after('booking_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('booking_payment_method');
            $table->dropColumn('booking_total');
            $table->dropColumn('booking_days');
        });
    }
};

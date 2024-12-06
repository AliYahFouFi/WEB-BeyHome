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
        $table = "bookings";
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('property_id'); // Foreign Key to properties table
            $table->unsignedBigInteger('user_id'); // Foreign Key to users table
            $table->date('start_date'); // Booking start date
            $table->date('end_date'); // Booking end date
            $table->decimal('total_price', 15, 2); // Total price for the booking
            $table->string('status')->default('pending'); // Booking status (e.g., pending, confirmed, canceled)
            $table->timestamps(); // created_at and updated_at


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

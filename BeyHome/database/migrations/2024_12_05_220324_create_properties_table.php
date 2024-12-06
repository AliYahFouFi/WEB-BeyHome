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
        Schema::create('properties', function (Blueprint $table) {
            $table->id(); // id (Primary Key)
            $table->string('name'); // name
            $table->text('description')->nullable(); // description
            $table->decimal('price', 15, 2); // price (decimal to handle large amounts and two decimal places)
            $table->string('category'); // category (string)
            $table->unsignedBigInteger('user_id'); // user_id (Foreign Key to users table)
            $table->decimal('rating', 3, 2)->nullable(); // rating (e.g., 4.5 out of 5)
            $table->string('location'); // location (string)
            $table->decimal('area', 10, 2)->nullable(); // area (e.g., 1200.50 sq. ft.)
            $table->integer('bedrooms')->default(0); // bedrooms
            $table->integer('bathrooms')->default(0); // bathrooms
            $table->integer('parking_spaces')->default(0); // parking_spaces
            $table->boolean('furnished')->default(false); // furnished (Boolean: Yes/No)
            $table->boolean('booked')->default(false); // booked (Boolean: Yes/No)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

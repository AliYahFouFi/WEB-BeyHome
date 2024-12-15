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
        Schema::table('properties', function (Blueprint $table) {
            $table->json('images')->nullable();  // Use `json` type if using a database that supports it (like MySQL 5.7+)
        });
    }
    
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }
    
};

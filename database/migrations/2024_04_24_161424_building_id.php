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
        Schema::table('rooms_table', function (Blueprint $table) {
            // $table->foreignIdFor(buildings_table::class); //Here we are creating a column for room to act as a foregin Id in for building Table
            $table->foreignId('building_id')->references('id')->on('buildings_table')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms_table', function (Blueprint $table) {
            //
        });
    }
};

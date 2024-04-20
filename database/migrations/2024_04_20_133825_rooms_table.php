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
        Schema::create('rooms_table', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name')->nullable();
            $table->string('avaliability')->nullable();
            $table->bigInteger('price')->nullable();
            $table->text('services')->nullable();
            $table->text('details')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

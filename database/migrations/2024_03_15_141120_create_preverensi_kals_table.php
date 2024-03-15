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
        Schema::create('preverensi_kals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kalkulasis_id')->constrained('kalkulasis');
            $table->string('preverensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preverensi_kals');
    }
};

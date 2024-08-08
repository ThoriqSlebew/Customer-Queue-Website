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
        Schema::create('antrean_tellers', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->smallInteger('no_antrean');
            $table->enum('status', ['0', '1'])->default('0');
            $table->smallInteger('no_counter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antrean_tellers');
    }
};

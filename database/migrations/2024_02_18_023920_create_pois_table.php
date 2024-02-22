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
        Schema::create('pois', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('deskripsi')->default('belum ada informas');
            $table->string('objek', 50);
            $table->string('latitude', 20)->nullable;
            $table->string('longitude', 20)->nullable;
            $table->text('koordinat_polygon')->nullable;
            $table->smallInteger('jml_titik')->nullable;       
            $table->foreignId('jenis_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pois');
    }
};

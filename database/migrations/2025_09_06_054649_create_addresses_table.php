<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();  // ID unik untuk alamat
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Menghubungkan alamat dengan user
            $table->string('address');  // Alamat pengiriman
            $table->decimal('latitude', 10, 7)->nullable();  // Latitude, nullable
            $table->decimal('longitude', 10, 7)->nullable();  // Longitude, nullable
            $table->timestamps();  // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};

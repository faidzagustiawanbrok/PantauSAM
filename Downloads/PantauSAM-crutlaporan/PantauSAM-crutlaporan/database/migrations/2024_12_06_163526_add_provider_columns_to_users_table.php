<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // Kolom id AUTO_INCREMENT
            $table->string('Nama_Lokasi', 255); // Kolom Nama_Lokasi
            $table->decimal('Latitude', 10, 7); // Kolom Latitude
            $table->decimal('Longitude', 10, 7); // Kolom Longitude
            $table->text('detail'); // Kolom detail
            $table->enum('status', ['diproses', 'diterima', 'ditolak', 'selesai'])->default('diterima'); // Kolom status dengan enum
            $table->string('image', 255); // Kolom image
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->unsignedBigInteger('user_id')->after('id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};

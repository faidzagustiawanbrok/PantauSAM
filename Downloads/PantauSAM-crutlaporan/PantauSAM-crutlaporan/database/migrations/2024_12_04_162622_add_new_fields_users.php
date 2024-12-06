<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom id AUTO_INCREMENT
            $table->string('name', 255); // Kolom name
            $table->string('email', 255)->unique(); // Kolom email dengan index unik
            $table->tinyInteger('role')->default(3); // Kolom role dengan default 3
            $table->string('foto', 255)->nullable(); // Kolom foto nullable
            $table->string('telpon', 255)->nullable(); // Kolom telpon nullable
            $table->string('alamat', 255)->nullable(); // Kolom alamat nullable
            $table->enum('kelamin', ['laki-laki', 'perempuan', 'tidak ingin menyertakan'])->default('tidak ingin menyertakan'); // Kolom kelamin dengan enum dan default value
            $table->timestamp('email_verified_at')->nullable(); // Kolom email_verified_at nullable
            $table->string('password', 255); // Kolom password
            $table->string('remember_token', 100)->nullable(); // Kolom remember_token nullable
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

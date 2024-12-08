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
            $table->string('provider')->nullable();
        $table->string('provider_id')->nullable();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

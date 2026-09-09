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
        Schema::create('karyas', function (Blueprint $table) {
            $table->id('id_karya');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('file_gambar');
            $table->foreignId('id_user')->constrained('users','id_user');
            $table->foreignId('id_kategori')->constrained('kategoris','id_kategori')->restrictOnDelete;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};

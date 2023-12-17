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
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('bidang_usaha');
            $table->longText('alamat');
            $table->longText('deskripsi');
            $table->string('email');
            $table->string('kontak');
            $table->enum('status',['Draft','Accepted','Rejected'])->default('Draft');
            $table->text('foto_postingan');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postingans');
    }
};

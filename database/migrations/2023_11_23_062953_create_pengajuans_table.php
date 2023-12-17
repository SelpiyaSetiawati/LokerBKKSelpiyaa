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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('nis',8);
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('jenis_kelamin');
            $table->integer('tb');
            $table->integer('bb');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_tlp');
            $table->text('persyaratan');
            $table->string('lowongan');
            $table->date('tgl_pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};

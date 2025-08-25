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
        Schema::create('data_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('gender', ['L', 'P']);
            $table->text('alamat');
            $table->string('kota_kabupaten');
            $table->string('kode_kabupaten');
            $table->string('provinsi');
            $table->string('pekerjaan');
            $table->string('no_hp', 20)->unique();
            $table->string('email')->unique();
            $table->string('accept')->nullable();
            $table->enum('tipe_pendaftaran', ['individu', 'komunitas'])->default('individu');
            $table->string('nama_komunitas')->nullable();

            // jenis pemancingan yang diminati (boleh multi, jadi pakai json biar fleksibel)
            $table->json('jenis_pemancingan');
            // contoh simpan: ["laut", "sungai", "kolam", "muara", "danau", "lainnya"]

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_anggotas');
    }
};

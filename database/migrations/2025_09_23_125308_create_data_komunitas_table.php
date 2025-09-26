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
        Schema::create('data_komunitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_komunitas');
            $table->string('nama_ketua');
            $table->date('tanggal_berdiri')->nullable();
            $table->string('nama_narahubung')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->text('alamat')->nullable();
            $table->string('logo')->nullable();
            $table->longText('visi_misi')->nullable();
            $table->longText('fokus_kegiatan')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('lainnya')->nullable();
            $table->string('signature')->nullable();
            $table->string('accept')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_komunitas');
    }
};

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
        Schema::create('data_usaha', function (Blueprint $table) {
            $table->id();
            $table->string('provinsi')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->string('nama_usaha');
            $table->string('logo_usaha')->nullable();
            $table->date('tanggal_berdiri')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('nomor_izin_usaha')->nullable();
            $table->string('produk_jasa')->nullable();
            $table->text('alamat_usaha')->nullable();
            $table->string('nomor_telepon_usaha', 20)->nullable();
            $table->string('email_usaha')->nullable();
            $table->string('website_usaha')->nullable();
            $table->string('nama_penanggung_jawab')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('nomor_telepon_penanggung', 20)->nullable();
            $table->string('email')->nullable();
            $table->longText('signature_usaha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_usaha');
    }
};

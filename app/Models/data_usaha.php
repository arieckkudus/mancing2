<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_usaha extends Model
{
    protected $table = 'data_usaha';

    protected $fillable = [
        'provinsi',
        'kota_kabupaten',
        'nama_usaha',
        'logo_usaha',
        'tanggal_berdiri',
        'jenis_usaha',
        'nomor_izin_usaha',
        'produk_jasa',
        'alamat_usaha',
        'nomor_telepon_usaha',
        'email_usaha',
        'website_usaha',
        'nama_penanggung_jawab',
        'jabatan',
        'nomor_telepon_penanggung',
        'email',
        'signature_usaha',
    ];

    protected $casts = [
        'tanggal_berdiri' => 'date',
    ];
}

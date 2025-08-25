<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_anggota extends Model
{
    protected $table = 'data_anggota';

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'alamat',
        'kota_kabupaten',
        'kode_kabupaten',
        'provinsi',
        'pekerjaan',
        'no_hp',
        'email',
        'tipe_pendaftaran',
        'accept',
        'nama_komunitas',
        'jenis_pemancingan',
    ];

    protected $casts = [
        'jenis_pemancingan' => 'array',
        'tanggal_lahir' => 'date',
    ];
}

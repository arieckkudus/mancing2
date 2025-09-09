<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_anggota extends Model
{
    protected $table = 'data_anggota';

    protected $fillable = [
        'kode',
        'nama_lengkap',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
        'gender',
        'alamat',
        'kota_kabupaten',
        'status',
        'provinsi',
        'pekerjaan',
        'no_hp',
        'email',
        'tipe_pendaftaran',
        'accept',
        'nama_komunitas',
        'jenis_pemancingan',
        'signature',
    ];

    protected $casts = [
        'jenis_pemancingan' => 'array',
        'tanggal_lahir' => 'date',
    ];
}

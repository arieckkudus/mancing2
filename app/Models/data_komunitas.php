<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data_komunitas extends Model
{
    protected $table = 'data_komunitas';

    protected $fillable = [
        'nama_komunitas',
        'nama_ketua',
        'tanggal_berdiri',
        'nama_narahubung',
        'no_hp',
        'email',
        'provinsi',
        'kota_kabupaten',
        'alamat',
        'logo',
        'visi_misi',
        'fokus_kegiatan',
        'facebook',
        'instagram',
        'tiktok',
        'lainnya',
        'signature',
        'accept',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'title',
        'content',
        'pict',
        'show',
        'user_id',
    ];

    public function penulis()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

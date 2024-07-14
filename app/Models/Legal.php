<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'user_id',
        'residence_id',
        'kartu_konsumen',
        'mpp',
        'fpa',
        'sp3k',
        'data_diri',
        'pk',
        'sertifikat',
        'spr',
        'bphtb',
        'ajb',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteLegal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'legal_id',
        'reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function legal()
    {
        return $this->belongsTo(Legal::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'dossier_id',
        'user_id',
        'content'
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

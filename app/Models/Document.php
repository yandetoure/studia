<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'dossier_id',
        'file_path',
        'category',
        'display_name'
    ];

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}

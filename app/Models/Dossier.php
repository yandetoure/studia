<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = [
        'client_id',
        'service_type',
        'target_country',
        'institution',
        'status',
        'checklist',
        'key_dates',
        'user_id'
    ];

    protected $casts = [
        'checklist' => 'array',
        'key_dates' => 'array',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}

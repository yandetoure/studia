<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_number',
        'last_name',
        'first_name',
        'gender',
        'birth_date',
        'nationality',
        'address',
        'phone',
        'email',
        'status',
        'education_level',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dossiers()
    {
        return $this->hasMany(Dossier::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}

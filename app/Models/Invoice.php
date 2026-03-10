<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'client_id',
        'dossier_id',
        'invoice_number',
        'type',
        'total_amount',
        'status',
        'due_date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

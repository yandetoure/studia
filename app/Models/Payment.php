<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'invoice_id',
        'account_id',
        'amount',
        'method',
        'payment_date',
        'reference'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transactions()
    {
        return $this->morphMany(AccountTransaction::class, 'transactionable');
    }
}

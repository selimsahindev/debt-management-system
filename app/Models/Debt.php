<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'description',
        'amount',
        'due_date',
        'is_paid',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getFormattedDebt()
    {
        return [
            'id' => $this->attributes['id'],
            'customerId' => $this->attributes['customer_id'],
            'description' => $this->attributes['description'],
            'amount' => $this->attributes['amount'],
            'dueDate' => $this->attributes['due_date'],
            'isPaid' => $this->attributes['is_paid'],
        ];
    }
}

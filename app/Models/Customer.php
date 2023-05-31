<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];

    public function getFormattedCustomer()
    {
        return [
            'id' => $this->attributes['id'],
            'user_id' => $this->attributes['user_id'],
            'firstName' => $this->attributes['first_name'],
            'lastName' => $this->attributes['last_name'],
            'email' => $this->attributes['email'],
            'phone' => $this->attributes['phone'],
            'address' => $this->attributes['address'],
        ];
    }

    public function debts()
    {
        return $this->hasMany(Debt::class);
    }
}

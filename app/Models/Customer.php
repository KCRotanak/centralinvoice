<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'company_id',
        'invoice_id',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'invoice_id');
    }
}

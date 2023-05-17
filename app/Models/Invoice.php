<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'refnumber',
        'pincode',
        'date',
        'subtotal',
        'tax',
        'discount',
        'totalamount',
        'image',
        'customer_id',
        'company_id',
        'item_id',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function items(){
        return $this->hasMany(Item::class);
    }
    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'amount','payment_id','razorpay_id','payment_status'];
    protected $table = "payment";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
    
}

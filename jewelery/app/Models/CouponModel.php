<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    use HasFactory;

    protected $table = "discount_coupons";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
}

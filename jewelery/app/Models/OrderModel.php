<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;


    protected $fillable = [
        
    ];


    protected $table = "orders";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;

}

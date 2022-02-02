<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemModel extends Model
{
    use HasFactory;


    protected $fillable = [
        
    ];
    protected $table = "order_items";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;

}

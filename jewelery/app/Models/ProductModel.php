<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'description','price','weight','discount','product_category','product_type','product_matrial','is_active','is_new'];
    protected $table = "products";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
    
}

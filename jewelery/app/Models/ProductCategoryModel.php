<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name','is_active','image'];
    protected $table = "product_categories";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
    
}

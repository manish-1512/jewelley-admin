<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypeModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name','is_active'];
    protected $table = "product_types";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
    
}

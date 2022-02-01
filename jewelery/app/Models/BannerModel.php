<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'is_active', 'image','order_by'
    ];

    protected $table = "banner_images";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;

}

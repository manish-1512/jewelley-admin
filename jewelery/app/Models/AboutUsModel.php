<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUSModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'is_active'];
    protected $table = "about_us";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
    
}

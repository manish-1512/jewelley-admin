<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddressModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id'];
    protected $table = "user_addresses";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
    
}

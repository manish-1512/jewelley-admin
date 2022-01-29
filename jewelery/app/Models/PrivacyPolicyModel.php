<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicyModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'description'];
    protected $table = "privacy_policy";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUSModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'email','subject','message'];
    protected $table = "contact_us";
    protected $primaryKey ="id";
    public $timestamps =true;
    public $incrementing = true;
}

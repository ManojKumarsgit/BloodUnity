<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','password','phone','address','country','state','city','bgroup','is_avail','last_donated'];
    
}

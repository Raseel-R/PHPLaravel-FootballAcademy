<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //add name and email 
    protected $fillable = ['name','email'];
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    
        protected $fillable = [
            'nom',
            'email',
            'password',
            'role',
            'contact',
        ];
    
}

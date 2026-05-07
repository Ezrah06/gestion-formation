<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
    
     protected $table = 'formation';

    protected $fillable = [
        'nom',
        'module',
        'prix'
    ];
}


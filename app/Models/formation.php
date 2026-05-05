<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'module',
        'prix'
    ];
}

{
    return $this->hasMany(Inscription::class);
}
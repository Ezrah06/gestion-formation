<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_client',
        'montant',
        'mode_paiement',
        'date_paiement',
    ];

    protected $hidden = [
        
    ];

    protected $casts = [
        'montant' => 'decimal:2',
        'date_paiement' => 'date',
    ];

    public function isEspece()
    {
        return $this->mode_paiement === 'espece';
    }

    public function isMobileMoney()
    {
        return $this->mode_paiement === 'mobile_money';
    }

    public function isVirement()
    {
        return $this->mode_paiement === 'virement';
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'rifa_id',
        'total_amount',
        'payment_status',
        'pix_txid',
        'pix_payload',
        'reserved_at',
        'expires_at',
    ];
    public function cliente(){
        return $this->belongsTo(Cliente::class, 'client_id');
    }
    public function rifa(){
        return $this->belongsTo(Rifa::class);
    }
    public function numeros(){
        return $this->hasMany(Numero::class);
    }
}

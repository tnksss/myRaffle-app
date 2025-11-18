<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'rifa_id',
        'number',
        'status',
        'pedido_id',
        'reserved_until',
    ];
    // Um Número pertence a uma Rifa
    public function rifa()
    {
        return $this->belongsTo(Rifa::class);
    }

    // Um Número pertence a um Pedido (é um relacionamento opcional - nullable)
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }


}
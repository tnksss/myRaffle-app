<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'whatsapp',
        'email',
    ];
    public function pedidos(){
        return $this->hasMany(Pedido::class,'client_id');
    }
}

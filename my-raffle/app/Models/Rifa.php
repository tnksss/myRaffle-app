<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'title',
        'slug',
        'description',
        'value',
        'total_numbers',
        'numbers_sold',
        'draw_date',
        'min_numbers_to_draw',
        'status',
        // 'winner_number' e 'winner_client_id' não são preenchidos na criação
    ];
    public function numeros()
    {
        return $this->hasMany(Numero::class);
    }
    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Celula extends Model
{
    use Notifiable;

    protected $fillable = [
        'lider_id', 
        'name', 
        'diaDaSemana', 
        'horario', 
        "anfiteao_id", 
        'logradouro', 
        'numero', 
        'bairro', 
        'cidade', 
        'uf', 
        'cep', 
        'obs'
    ];

    public function lider()
    {
        return $this->hasOne(Discipulo::class, 'id', 'lider_id');
    }
}

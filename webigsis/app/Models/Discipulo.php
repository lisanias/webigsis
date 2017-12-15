<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipulo extends Model
{
    protected $fillable = [
        'lider_id', 
        'user_id', 
        'name', 
        'email', 
        'avatar', 
        'sexo', 
        'nascimento_data', 
        'nascimento_cidade', 
        'nascimento_uf',
        'recebidoModo',
        'encontro', 
        'escolaMinisterios', 
        'batismo',
        'batismo_data',
        'ativo',
        'logradouro', 
        'numero', 
        'bairro', 
        'cidade', 
        'uf', 
        'cep'
    ];
    protected $guarded = ['id', 'created_at', 'updated_at'];
}

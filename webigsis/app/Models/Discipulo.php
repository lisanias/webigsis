<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipulo extends Model
{
    protected $fillable = [
        'e_lider', 
        'lider_id', 
        'user_id', 
        'name', 
        'email', 
        'avatar', 
        'sexo', 
        'nascimento_data', 
        'nascimento_cidade', 
        'nascimento_uf',
        'recebidoModo_id',
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

    protected $dates = ['nascimento_data', 'batismo_data'];
}

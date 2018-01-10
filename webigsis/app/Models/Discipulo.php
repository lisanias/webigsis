<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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


    public function setNameAttribute($value) {
        $this->attributes['name'] = primeiraMaiuscula($value);
    }

    public function setLogradouroAttribute($value) {
        $this->attributes['logradouro'] = primeiraMaiuscula($value);
    }

    public function setBairroAttribute($value) {
        $this->attributes['bairro'] = primeiraMaiuscula($value);
    }

    public function setCidadeAttribute($value) {
        $this->attributes['cidade'] = primeiraMaiuscula($value);
    }

    public function setNascimentocidadeAttribute($value) {
        $this->attributes['nascimento_cidade'] = primeiraMaiuscula($value);
    }
    
    public function setNascimentoufAttribute($value) {
        $this->attributes['nascimento_uf'] = strtoupper($value);
    }


    public function setUfAttribute($value) {
        $this->attributes['uf'] = strtoupper($value);
    }

    public function setCepAttribute($value) {

        $str = preg_replace("/[^0-9]/", "", $value);

        if( strlen($str)==8 ){          
            $subStr1 = substr($str, 0, 5);
            $subStr2 = substr($str, 5);
            $str = $subStr1.'-'.$subStr2;
        }
        else{
            $str = null;
        }
        $this->attributes['cep'] = $str;
    }

    
    /** 
     *  ANIVERSARIANTES DA SEMANA / MES
     *  No Controler colocar: $niverDaSemana = Discipulo::WeekBirthdays()->get();
     */
    public function scopeWeekBirthdays($query)
        {
            return $query
                ->whereRaw('extract(week from nascimento_data) = ?', [Carbon::today()->weekOfYear])
                ->orderByRaw ('extract(day from nascimento_data)', 'asc');
        }

    public function scopeMonthBirthdays($query)
        {
            return $query
                ->whereRaw('extract(month from nascimento_data) = ?', [Carbon::today()->month])
                ->orderByRaw ('extract(day from nascimento_data)', 'asc');
            
        }
    
            
            
}

function primeiraMaiuscula($value) {
    
    $palavra=explode( " ", mb_convert_case($value, MB_CASE_LOWER, 'UTF-8') );
    $nomeconvertido = '';

    for ($i=0; $i < count($palavra) ; $i++)
    {
        if ($palavra[$i] != "da" && $palavra[$i] != "de" && $palavra[$i] != "do" && $palavra[$i] != "das" && $palavra[$i] != "dos" && $palavra[$i] != "e")
        {
            $palavra[$i] = mb_convert_case($palavra[$i], MB_CASE_TITLE, 'UTF-8');
        }
        $nomeconvertido .= $palavra[$i]." ";
    }

    return $nomeconvertido;
}

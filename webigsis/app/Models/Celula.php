<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function discipulos()
    {
        return $this->hasMany(Discipulo::class, 'celula_id', 'id');
    }


     public function setNameAttribute($value) {
        $this->attributes['name'] = primeiraMaiusculaCelula($value);
    }

    public function setLogradouroAttribute($value) {
        $this->attributes['logradouro'] = primeiraMaiusculaCelula($value);
    }

    public function setBairroAttribute($value) {
        $this->attributes['bairro'] = primeiraMaiusculaCelula($value);
    }

    public function setCidadeAttribute($value) {
        $this->attributes['cidade'] = primeiraMaiusculaCelula($value);
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

}



function primeiraMaiusculaCelula($value) {
    
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

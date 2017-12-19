<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = [
        'discipulo_id',
        'tipo',
        'descricao',
        'numero'
    ];

    public function setNumeroAttribute($value) {
        $this->attributes['numero'] = formataNumero($value);
    }
    
}

function formataNumero($str) {
    
        $str = preg_replace("/[^0-9]/", "", $str);
     
        switch (strlen($str)) {
            case 8:
                $subStr2 = substr($str, 4);
                $subStr1 = substr($str, 0, 4);
                $str = $subStr1.'-'.$subStr2;
                break;
            case 9:
                $subStr2 = substr($str, 5);
                $subStr1 = substr($str, 0, 5);
                $str = $subStr1.'-'.$subStr2;
                break;
            case 10:
                $subStr2 = substr($str, 6);
                $subStr1 = substr($str, 2, 4);
                $subStr0 = substr($str, 0, 2);
                $str = '('.$subStr0.') '.$subStr1.'-'.$subStr2;
                break;
            case 11:
                $subStr2 = substr($str, 7);
                $subStr1 = substr($str, 2, 5);
                $subStr0 = substr($str, 0, 2);
                $str = '('.$subStr0.') '.$subStr1.'-'.$subStr2;
                break;
        }
    
        return $str;
    }

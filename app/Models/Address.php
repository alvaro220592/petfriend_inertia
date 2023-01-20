<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'localidade',
        'uf',
        'ibge', 
        'gia',
        'ddd',
        'siafi'
    ];

    // Cadastrando através do controller de clientes.
    public static function storeFromClient($dados) {
        $model = self::where('cep', $dados['cep'])->first();
        
        if($model){
            $model_id = $model->id;
            return $model->id;
        }else{
            $model = new self;
            $model->fill($dados);
            $model->save();
            return $model->id;
        }
    }
}

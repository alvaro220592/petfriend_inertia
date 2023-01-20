<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = ['telefone', 'client_id'];

    // Cadastrando através do controller de clientes.
    public static function storeFromClient($dados, $client_id) {        
        $model = new self;
        $model->telefone = $dados['telefone'];
        $model->client_id = $client_id;
        $model->save();
    }
}

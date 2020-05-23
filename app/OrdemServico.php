<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $fillable = [
                            'cliente_id', 'servico_id', 'status', 'user_create', 'data_create', 'user_open',
                            'data_open', 'user_closed', 'data_closed', 'observacoes', 'motivo', 'duracao', 'espera'
                            ];

    public function cliente()
    {
        return $this->hasOne(Clientes::class, 'cliente_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function servico()
    {
        return $this->hasOne(Servicos::class, 'servico_id');
    }
}

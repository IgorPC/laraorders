<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function ordemServico()
    {
        return $this->hasOne(OrdemServico::class, 'servico_id');
    }

}

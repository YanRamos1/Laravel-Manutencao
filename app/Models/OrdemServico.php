<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table = 'ordem_servicos';
    protected $fillable = ['valor_total','descricao','status','equipamento_id'];
    use HasFactory;
}

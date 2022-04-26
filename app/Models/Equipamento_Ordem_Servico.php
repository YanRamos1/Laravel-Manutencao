<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento_Ordem_Servico extends Model
{
    protected $table = 'equipamento_ordem_servico';
    protected $fillable = ['equipamento_id', 'ordem_servico_id'];
    use HasFactory;
}

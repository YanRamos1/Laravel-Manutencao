<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tipo_Equipamento;


class Equipamento extends Model
{
    protected $table = 'equipamentos';
    protected $fillable = ['nome', 'serial', 'tipo_equipamento_id'];
    use HasFactory;
}

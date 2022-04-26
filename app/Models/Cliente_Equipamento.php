<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_Equipamento extends Model
{
    protected $table = 'cliente_equipamento';
    protected $fillable = ['id','cliente_id','equipamento_id'];
    use HasFactory;
}

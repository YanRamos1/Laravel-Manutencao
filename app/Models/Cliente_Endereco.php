<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_Endereco extends Model
{
    protected $table = 'cliente_endereco';
    protected $fillable = ['cliente_id', 'cidade','rua','descricao'];
    use HasFactory;
}

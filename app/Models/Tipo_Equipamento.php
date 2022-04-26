<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Equipamento extends Model
{
    protected $table = 'tipo_equipamentos';
    protected $fillable = ['nome'];

    use HasFactory;

    public function ValidadeName($nome){
        //verify if the name is valid and is exist in the database
        $tipo_equipamento = Tipo_Equipamento::where('nome', $nome)->first();
        if($tipo_equipamento){
            return true;
        }else{
            return false;
        }
    }
}

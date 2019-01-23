<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    protected $fillable = ['nome','email','telefone','cep','rua','numero','bairro','cidade','uf','sexo'];
    protected $table = 'agendas';

    

}

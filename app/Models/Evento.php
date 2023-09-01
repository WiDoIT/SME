<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    static $rules=[
        'start'=>'required',
        'end'=>'required',
        'tecnico_id' => 'required',
        'maquina_id'=>'required'
    ];
    protected $fillable=['start','end','tecnico_id','maquina_id'];
}

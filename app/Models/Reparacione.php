<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reparacione
 *
 * @property $id
 * @property $start
 * @property $end
 * @property $tecnico_id
 * @property $maquina_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Maquina $maquina
 * @property Tecnico $tecnico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reparacione extends Model
{
    
    static $rules = [
		'start' => 'required',
		'end' => 'required',
		'tecnico_id' => 'required',
		'maquina_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['start','end','tecnico_id','maquina_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maquina()
    {
        return $this->hasOne('App\Models\Maquina', 'id', 'maquina_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tecnico()
    {
        return $this->hasOne('App\Models\Tecnico', 'id', 'tecnico_id');
    }
    

}

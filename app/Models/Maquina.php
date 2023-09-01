<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Maquina
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Reparacione[] $reparaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Maquina extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reparaciones()
    {
        return $this->hasMany('App\Models\Reparacione', 'maquina_id', 'id');
    }
    

}

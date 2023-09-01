<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tecnico
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $created_at
 * @property $updated_at
 *
 * @property Reparacione[] $reparaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tecnico extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reparaciones()
    {
        return $this->hasMany('App\Models\Reparacione', 'tecnico_id', 'id');
    }
    

}

<?php

namespace lisTUBE;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable = [
        //'nombre', 'genero', 'descripcion','duracion','fechaSubida','ubicacion','calificacion','user_id',
        'nombre', 'genero', 'descripcion',
    ];

    public function users(){
        return $this->belongsTo('lisTUBE\User');
    }
}



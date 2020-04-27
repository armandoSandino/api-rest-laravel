<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
protected $table = "contacto";
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'foto'
    ];
        protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function rules($isNew = true)
    {
        return [
            'nombre' => 'required|min:5|max:100',
            'telefono' => 'required|unique:contacto,telefono,' . ($isNew ? '' : request('contacto')->id)
        ];
    }

}

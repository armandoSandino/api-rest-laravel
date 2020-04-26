<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactoRequest extends FormRequest {
    public function authorize() {
        return true;
    }
    public function rules() {
        // \dd( $this->route('contacto')->id );
        return [
            'nombre' => 'required|min:5|max:100',
            'telefono' => 'required|unique:contacto,telefono,'.$this->route('contacto')->id
        ];
        //contacto es el nombre de la tabla
    }
}
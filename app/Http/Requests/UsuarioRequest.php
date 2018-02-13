<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:4|max:120|required',
            //'segundo_nombre' => 'min:4|max:120',
            'primer_apellido' => 'min:4|max:120|required',
            //'segundo_apellido' => 'min:4|max:120',
            'rut' => 'min:4|max:120|required',
            'sexo' => 'min:4|max:120|required',
            'direccion' => 'min:4|max:250|required',
            'telefono' => 'min:4|max:120|required',
            'email' => 'min:4|max:250|required|unique:users',
            'password' => 'min:4|max:120|required',
            'image' => 'required'
        ];
    }
}

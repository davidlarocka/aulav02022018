<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProyectoRequest extends FormRequest
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
            'nombre_proyecto' => 'min:6|max:250|required',   //vas indicando cada campo como quieres que se valide
            //'nombre_proyecto' => 'min:6|max:250|required',   //vas indicando cada campo como quieres que se valide
            'descripcion' => 'min:10|required',
            'fecha_publicacion' => 'nullable|date',
            'fecha_entrega' => 'nullable|date',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticulosRequest extends FormRequest
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
       'titulo' => 'min:6|max:250|required|unique:articulos',   //vas indicando cada campo como quieres que se valide
      'contenido' => 'min:40|required',
       'categoria_id'=> 'required',
       'imagen' => 'image|required'
        ];
    }
}

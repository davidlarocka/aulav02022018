<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapsulaRequest extends FormRequest
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
        'titulo' => 'min:6|max:250|required',   //vas indicando cada campo como quieres que se valide
        'descripcion' => 'min:10|required',
        ];
    }
}

<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoFormRequest extends FormRequest
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
            'nombre'=>'required|alpha|max:255'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' =>'Se requiere de este campo',
            'nombre.alpha' =>'Solo acepta letras',
            'nombre.max' =>'Solo acepta 255 caracteres',
        ];
    }
}

<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipopersonaFormRequest extends FormRequest
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
            'tipo_persona'=>'required|alpha|max:255'
        ];
    }
    public function messages()
    {
        return [
            'tipo_persona.required' =>'Se requiere de este campo',
            'tipo_persona.alpha' =>'Solo acepta letras',
            'tipo_persona.max' =>'Solo acepta 255 caracteres',
        ];
    }
}

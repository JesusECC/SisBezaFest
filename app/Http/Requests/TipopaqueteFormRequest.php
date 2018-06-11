<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipopaqueteFormRequest extends FormRequest
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
            'nom_paquete'=>'required|alpha´|max:255',

        ];
    }
    public function messages()
    {
        return [

            'nom_paquete.required' =>'Se requiere de este campo',
            'nom_paquete.alpha' =>'Solo acepta letras',
            'nom_paquete.max' =>'Solo acepta 255 caracteres',
        ];
    }
}

<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'num_doc'=>'required',
            'nombres',
            'ap_paterno',
            'ap_materno',
            'celular',
            'telefono',
            'sexo',
            'direccion',
            'correo',
            'fech_nacimiento',
            'edad',
            'tipo_documento_id',
            'Estado_id',
            'tipo_persona_id'
        ];
    }
}

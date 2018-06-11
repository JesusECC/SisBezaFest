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
            'num_doc'=>'required|numeric',
            'nombres'=>'required|alpha|max:255',
            'ap_paterno'=>'required|alpha|max:255',
            'ap_materno'=>'required|alpha|max:255',
            'celular'=>'required|numeric|max:9',
            'telefono'=>'required|numeric|max:7',
            'sexo'=>'required',
            'direccion'=>'required|max:255',
            'correo'=>'required|email|max:255|unique:persona,correo',
            'fech_nacimiento'=>'required',
            'edad'=>'required|numeric|min:18',
            'tipo_documento_id'=>'required',
            'Estado_id'=>'required',
            'tipo_persona_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'num_doc.required' =>'Se requiere de este campo',
            'nombre.required' =>'Se requiere de este campo',
            'ap_paterno.required' =>'Se requiere de este campo',
            'ap_materno.required' =>'Se requiere de este campo',
            'celular.required' =>'Se requiere de este campo',
            'telefono.required' =>'Se requiere de este campo',
            'sexo.required' =>'Se requiere de este campo',
            'direccion.required' =>'Se requiere de este campo',
            'correo.required' =>'Se requiere de este campo',
            'fech_nacimiento.required' =>'Se requiere de este campo',
            'edad.required' =>'Se requiere de este campo',
            'tipo_documento_id.required' =>'Se requiere de este campo',
            'edad.required' =>'Se requiere de este campo',
            'Estado_id.required' =>'Se requiere de este campo',
            'tipo_persona_id.required' =>'Se requiere de este campo',
            'num_doc.numeric' =>'Solo acepta números',
            'celular.numeric' =>'Solo acepta números',
            'telefono.numeric' =>'Solo acepta números',
            'edad.numeric' =>'Solo acepta números',
            'nombre.alpha' =>'Solo acepta letras',
            'ap_materno.alpha' =>'Solo acepta letras',
            'ap_paterno.alpha' =>'Solo acepta letras',
            'nombre.max' =>'Solo acepta 255 caracteres',
            'ap_paterno.max' =>'Solo acepta 255 caracteres',
            'ap_materno.max' =>'Solo acepta 255 caracteres',
            'direccion.max' =>'Solo acepta 255 caracteres',
            'correo.max' =>'Solo acepta 255 caracteres',
            'celular.max' =>'Número de celular incorrecto ejemplo (947562430)',
            'telefono.max' =>'Número de teléfono incorrecto ejemplo(5504636)',
            'edad.numeric' =>'Coloque una edad válida mayor o igual a 18',
            'cooreo.email'=>'El campo requiere un correo valido',
            'correo.unique'=>'El correo ya esta registrado',
        ];
    }
}

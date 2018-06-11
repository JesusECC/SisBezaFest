<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
            'ruc'=>'required|max:11|numeric',
            'razon_social'=>'required|max:255|alpha',
            'nom_empresa'=>'required|max:255|alpha',
            'dir'=>'required|max:255',
            'cel'=>'required|max:9|numeric',
            'telefono'=>'required|max:7|numeric',
            'gmail'=>'required|email|max:255|unique:empresa,correo',
            'n_cuenta'=>'required|max:19|numeric',
            'Estado_id'=>'required',
            'persona_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'ruc.required' =>'Se requiere de este campo',
            'razon_social.required' =>'Se requiere de este campo',
            'nom_empresa.required' =>'Se requiere de este campo',
            'cel.required' =>'Se requiere de este campo',
            'tel.required' =>'Se requiere de este campo',
            'dir.required' =>'Se requiere de este campo',
            'gmail.required' =>'Se requiere de este campo',
            'edad.required' =>'Se requiere de este campo',
            'Estado_id.required' =>'Se requiere de este campo',
            'n_cuenta.required' =>'Se requiere de este campo',

            'ruc.numeric' =>'Solo acepta números',
            'cel.numeric' =>'Solo acepta números',
            'tel.numeric' =>'Solo acepta números',
            'n_cuenta.numeric' =>'Solo acepta números',

            'nom_empresa.alpha' =>'Solo acepta letras',
            'razon_social.alpha' =>'Solo acepta letras',
            
            'ruc.max' =>'Solo acepta 11 caracteres',
            'razon_social.max' =>'Solo acepta 255 caracteres',
            'nom_empresa.max' =>'Solo acepta 255 caracteres',
            'dir.max' =>'Solo acepta 255 caracteres',
            'gmail.max' =>'Solo acepta 255 caracteres',
            'cel.max' =>'Número de celular incorrecto ejemplo (947562430)',
            'tel.max' =>'Número de teléfono incorrecto ejemplo(5504636)',

            'ruc.numeric' =>'Solo acepta números',
            'n_cuenta.numeric'=>'Solo acepta números',
            'gmail.email'=>'El campo requiere un correo valido',
            'gmail.unique'=>'El correo ya esta registrado',
        ];
    }
}

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
            'nombre_empresa'=>'required|max:255|alpha',
            'direccion'=>'required|max:255',
            'celular'=>'required|max:9|numeric',
            'telefono'=>'required|max:7|numeric',
            'correo'=>'required|email|max:255|unique:empresa,correo',
            'numero_cuenta'=>'required|max:19|numeric',
            'Estado_id'=>'required',
            'persona_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'ruc.required' =>'Se requiere de este campo',
            'razon_social.required' =>'Se requiere de este campo',
            'nombre_empresa.required' =>'Se requiere de este campo',
            'celular.required' =>'Se requiere de este campo',
            'telefono.required' =>'Se requiere de este campo',
            'direccion.required' =>'Se requiere de este campo',
            'correo.required' =>'Se requiere de este campo',
            'edad.required' =>'Se requiere de este campo',
            'Estado_id.required' =>'Se requiere de este campo',
            'numero_cuenta.required' =>'Se requiere de este campo',

            'ruc.numeric' =>'Solo acepta números',
            'celular.numeric' =>'Solo acepta números',
            'telefono.numeric' =>'Solo acepta números',
            'numero_cuenta.numeric' =>'Solo acepta números',

            'nombre_empresa.alpha' =>'Solo acepta letras',
            'razon_social.alpha' =>'Solo acepta letras',
            
            'ruc.max' =>'Solo acepta 11 caracteres',
            'razon_social.max' =>'Solo acepta 255 caracteres',
            'nombre_empresa.max' =>'Solo acepta 255 caracteres',
            'direccion.max' =>'Solo acepta 255 caracteres',
            'correo.max' =>'Solo acepta 255 caracteres',
            'celular.max' =>'Número de celular incorrecto ejemplo (947562430)',
            'telefono.max' =>'Número de teléfono incorrecto ejemplo(5504636)',

            'ruc.numeric' =>'Solo acepta números',
            'numero_cuenta.numeric'=>'Solo acepta números',
            'cooreo.email'=>'El campo requiere un correo valido',
            'correo.unique'=>'El correo ya esta registrado',
        ];
    }
}

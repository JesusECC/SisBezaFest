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
            'ruc'=>'required',
            'ruc'=>'numeric',
            'ruc'=>'max:11',
            'ruc'=>'min:11',
            'razon_social'=>'required|max:255|alpha',
            'nom_empresa'=>'required|max:255|alpha',
            'dir'=>'required|max:255',
            'cel'=>'required',
            'cel'=>'regex:^\d*$',
            'cel'=>'numeric',
            'cel'=>'max:9',
            'cel'=>'min:9',
            'tel'=>'required',
            'tel'=>'max:7',
            'tel'=>'min:7',
            'tel'=>'numeric',
            'gmail'=>'required|email|max:255|unique:empresa,correo',
            'gmail'=>'regex:/(.*)gmail\.com/i',
            'gmail'=>'regex:/(.*)hotmail\.com/i',
            'n_cuenta'=>'required',
            'n_cuenta'=>'max:19',
            'n_cuenta'=>'min:19',
            'n_cuenta'=>'numeric',
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
            'n_cuenta.required' =>'Se requiere de este campo',

            'ruc.numeric' =>'Solo acepta números',
            'cel.numeric' =>'Solo acepta números',
            'tel.numeric' =>'Solo acepta números',
            'n_cuenta.numeric' =>'Solo acepta números',

            'nom_empresa.alpha' =>'Solo acepta letras',
            'razon_social.alpha' =>'Solo acepta letras',
            
            'ruc.max' =>'Solo acepta 11 caracteres',

            'razon_social.max'=>'Solo acepta 255 caracteres',
            'nom_empresa.max'=>'Solo acepta 255 caracteres',
            'dir.max'=>'Solo acepta 255 caracteres',
            'gmail.max'=>'Solo acepta 255 caracteres',
            'cel.max'=>'Número de celular incorrecto ejemplo (947562430)',
            'tel.max'=>'Solo acepta 7 números',
            'n_cuenta.max' =>'Solo acepta 19 caracteres',

            'ruc.numeric' =>'Solo acepta números RUC',
            'n_cuenta.numeric'=>'Solo acepta números NUMERO DE CUENTA',
            'gmail.email'=>'El campo requiere un correo valido',
            'gmail.unique'=>'El correo ya esta registrado',
            'ruc.min'=>'Son 11 números el RUC',
            'n_cuenta.min'=>'Son 19 números NUMERO DE CUENTA',
            'tel.min'=>'Solo acepta 7 números',
            'gmail.regex'=>'No es un correo gmail o hotmail',
            'cel.regex'=>'No acepta carateres especiales',
        ];
    }
}

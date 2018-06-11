<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFromRequest extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Agrega el nombre del usuario',
            'name.max'=>'Máximo acepta 255 caracteres',
            'email.required'=>'Agrega un correo valido',
            'email.email'=>'El campo requiere un correo valido',
            'email.unique'=>'El correo ya esta registrado',
            'password.min'=>'Coloca una contraseña igual o mayor de 6 caracteres',
            'password.confirmed'=>'Confirmar contraseña no es valida'
        ];
    }
}

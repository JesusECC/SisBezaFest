<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoFormRequest extends FormRequest
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
            'imagen'=>'required|mimes:jpeg,bmp,png',
            'nombre'=>'required',
            'nombre'=>'alpha',
            'nombre'=>'max:255',
            'fecha_creacion'=>'required',
            'fecha'=>'required',
            'fecha'=>'numeric',
            'hora'=>'required',
            'direccion'=>'required',
            'direccion'=>'max:255',
            'aforo'=>'numeric',
            'aforo'=>'required',
            'tipo_evento'=>'required',
            'descripcion'=>'required',
            'descripcion'=>'max:500',
            'Estado_id'=>'required',
            'empresa_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'imagen.mimes' =>'Solo acepta los formatos jpeg,bmp,png',
            'imagen.required' =>'Se requiere el nombre',
            'nombre.required' =>'Se requiere de este campo',
            'fecha_creacion.required' =>'Se requiere de este campo',
            'fecha.required' =>'Se requiere de este campo',
            'hora.required' =>'Se requiere de este campo',
            'aforo.required' =>'Se requiere de este campo',
            'direccion.required' =>'Se requiere de este campo',
            'tipo_evento.required' =>'Se requiere de este campo',
            'descripcion.required' =>'Se requiere de este campo',
            'Estado_id.required' =>'Se requiere de este campoo',
            'empresa_id.required' =>'Se requiere de este campo',
            'hora.numeric' =>'Solo acepta números',
            'nombre.alpha' =>'Solo acepta letras',
            'nombre.max' =>'Solo acepta 255 caracteres',
            'direccion.max' =>'Solo acepta 500 caracteres',
            'descripcion.max' =>'Solo acepta 255 caracteres',
        ];
    }
}

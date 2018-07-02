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
            'fecha'=>'required',
            'hora'=>'required',
            'direccion'=>'required',
            'direccion'=>'max:255',
            'aforo'=>'numeric',
            'aforo'=>'required',
            'tipo_evento'=>'required',
            'descripcion'=>'required',
            'descripcion'=>'max:500',
        ];
    }
    public function messages()
    {
        return [
            'imagen.mimes' =>'Solo acepta los formatos jpeg,bmp,png',
            'imagen.required' =>'Se requiere el nombre',
            'nombre.required' =>'Se requiere nombre',
            'fecha.required' =>'Se requiere fecha',
            'hora.required' =>'Se requiere hora',
            'aforo.required' =>'Se requiere aforo',
            'direccion.required' =>'Se requiere dirección',
            'tipo_evento.required' =>'Se requiere tipo de evento',
            'descripcion.required' =>'Se requiere descripcion',
            'hora.numeric' =>'Solo acepta números',
            'nombre.alpha' =>'Solo acepta letras',
            'nombre.max' =>'Solo acepta 255 caracteres',
            'direccion.max' =>'Solo acepta 500 caracteres',
            'descripcion.max' =>'Solo acepta 255 caracteres',
        ];
    }
}

<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaqueteFormRequest extends FormRequest
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
            'nombre'=>'required|alpha|max:255',
            'descripcion'=>'required|alpha|max:255',
            'precio'=>'required|numeric',
            'cantidad'=>'required|numeric',
            'nr_personas'=>'required|numeric',
            'tipo_paquete_id'=>'required',
            'evento_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'imagen.mimes' =>'Solo acepta los formatos jpeg,bmp,png',
            'imagen.required' =>'Se requiere de este campo',
            'nombre.required' =>'Se requiere de este campo',
            'precio.required' =>'Se requiere de este campo',
            'cantidad.required' =>'Se requiere de este campo',
            'nr_personas.required' =>'Se requiere de este campo',
            'tipo_paquete_id.required' =>'Se requiere de este campo',
            'evento_id.required' =>'Se requiere de este campoo',
            'precio.numeric' =>'Solo acepta números',
            'cantidad.numeric' =>'Solo acepta números',
            'nr_personas.numeric' =>'Solo acepta números',
            'nombre.max' =>'Solo acepta 255 caracteres',
            'descripcion.max' =>'Solo acepta 255 caracteres',
        ];
    }

}

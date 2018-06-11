<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreventaFormRequest extends FormRequest
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
            'nombre'=>'required|max:255|alpha',
            'porcentaje'=>'required|numeric',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
            'Estado_id'=>'required',
            'paquete_id'=>'required',
            'evento_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' =>'Se requiere de este campo',
            'porcentaje.required' =>'Se requiere de este campo',
            'fecha_fin.required' =>'Se requiere de este campo',
            'fecha_inicio.required' =>'Se requiere de este campo',
            'Estado_id.required' =>'Se requiere de este campo',
            'paquete_id.required' =>'Se requiere de este campo',
            'evento_id.required' =>'Se requiere de este campo',
            'porcentaje.numeric' =>'Solo acepta números',
            'nombre.alpha' =>'Solo acepta letras',
            'nombre.max' =>'Solo acepta 255 caracteres',
        ];
    }
}

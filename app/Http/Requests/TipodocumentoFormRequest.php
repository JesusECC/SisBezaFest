<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipodocumentoFormRequest extends FormRequest
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
            'tipo_doc'=>'required|max:20|alpha',
            'descripcion'=>'required|max:300|alpha'
        ];
    }
    public function messages()
    {
        return [
            'tipo_doc.required' =>'Se requiere este campo',
            'descripcion.required' =>'Se requiere este campo',
            'tipo_doc.max'=>'Máximo acepta 20 caracteres',
            'descripcion.max' =>'Máximo acepta 300 caracteres',
            'tipo_doc.alpha'=>'Solo acepta letras',
            'descripcion.alpha'=>'Solo acepta letras'
        ];
    }
}

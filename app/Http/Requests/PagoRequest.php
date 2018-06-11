<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoRequest extends FormRequest
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
        'cod_pago'=>'required',
        'tipo_pago_id'=>'required',
        'cliente_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'cod_pago.required' =>'Se requiere de este campo',
            'tipo_pago_id.required' =>'Se requiere de este campo',
            'cliente_id.required' =>'Se requiere de este campo',
        ];
    }
}

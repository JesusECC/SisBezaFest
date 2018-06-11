<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoPagoFormRequest extends FormRequest
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
            'tipopago'=>'required|alpha|max:255'
        ];
    }
    public function messages()
    {
        return [
            'tipopago.required' =>'Se requiere de este campo',
            'tipopago.alpha' =>'Solo acepta letras',
            'tipopago.max' =>'Solo acepta 255 caracteres',
        ];
    }
}

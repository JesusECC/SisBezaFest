<?php

namespace SisBezaFest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoComprobanteRequest extends FormRequest
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
            'comprobante'=>'required|alpha|max:255',
        ];
    }
    public function messages()
    {
        return [
            'comprobante.required' =>'Se requiere de este campo',
            'comprobante.alpha' =>'Solo acepta letras',
            'comprobante.max' =>'Solo acepta 255 caracteres',
        ];
    }

}

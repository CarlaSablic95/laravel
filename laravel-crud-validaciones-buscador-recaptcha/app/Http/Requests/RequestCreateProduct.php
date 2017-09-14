<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCreateProduct extends FormRequest
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
            'name' => 'required|min:3|max:20|string|unique:products,name',
            'description' => 'required|min:3',
            'price' => 'numeric|min:1',
            'cat_id' => 'required|not_in:0'
        ];
    }

    //perzonalizamos nuestro smensajes de error
    public function messages()
    {
        return [
            'cat_id.not_in' => 'Seleccione alguna categoria'
        ];
    }
}

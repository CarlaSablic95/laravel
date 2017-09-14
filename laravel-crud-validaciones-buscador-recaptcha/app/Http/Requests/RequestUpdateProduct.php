<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
//importamos la clase Route
use Illuminate\Routing\Route;

class RequestUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //declaro mi constructor para el el 'route'
    public function __construct(Route $route){
        $this->route = $route;
    }

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
        //ese parameter antes era getParameter, pero ahora cambio, es necesario tener el constructor para q esto funcione
        return [
            'name' => 'required|min:3|max:20|string|unique:products,name,'.$this->route->parameter('product'),
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

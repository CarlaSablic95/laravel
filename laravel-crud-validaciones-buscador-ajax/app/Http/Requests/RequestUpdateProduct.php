<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class RequestUpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        return [
            'name'=>'required|unique:products,name,'.$this->route->parameter('product'),
            'description'=>'required|string',
            'price'=>'required',
            'cat_id'=>'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'cat_id.not_in'=>'La categoria es obligatoria',
        ];
    }
}

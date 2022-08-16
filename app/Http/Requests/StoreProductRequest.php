<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */

    public function authorize() {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */

    public function rules() {
        return [
            'pTitle' =>'required|max:20',
            'manu_name' =>'required|max:20',
            'manu_brand' =>'required|max:20',
            'qty' =>'required|numeric',
            'pOldPrice' =>'required|numeric',
            'pSellingPrice' =>'required|numeric',
            'shortDescription' =>'required',
        ];

    }

    public function messages() {
        return [
            'product_name.require' => 'The product field name is required ',
        ];
    }
}
// Php artisan make:request StoreProductRequest

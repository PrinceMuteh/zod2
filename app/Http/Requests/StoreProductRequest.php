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
        return false;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */

    public function rules() {
        return [
            'product_name' =>'required|max:20',
            'quantity' =>'required',

        ];
    }

    public function messages() {
        return [
            'product_name.require' => 'The product field name is required ',
        ];
    }
}
// Php artisan make:request StoreProductRequest

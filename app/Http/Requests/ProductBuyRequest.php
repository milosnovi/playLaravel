<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductBuyRequest extends FormRequest
{
    /**
     * Return errors as json.
     *
     * @return bool
     */
    public function wantsJson()
    {
        return true;
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function response(Validator $validator)
    {
        $errors = $validator->errors();

        return response()->json([
            "response" => [
                "code"       => "BAD REQUEST",
                "message"    => $errors->messages(),
                "success"    => false
            ]
        ], 400);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required | exists:products,id',
        ];
    }
}


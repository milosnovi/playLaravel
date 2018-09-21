<?php

namespace App\Http\Requests;

use App\Models\Voucher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class VoucherRequest extends FormRequest
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
            Voucher::FIELD_END_DATE        => 'required',
            Voucher::FIELD_START_DATE      => 'required',
            Voucher::FIELD_DISCOUNT_TIERS  => 'sometimes | exists:discount_tiers,id',
            Voucher::FIELD_PRODUCT         => 'sometimes | exists:products,id'
        ];
    }
}

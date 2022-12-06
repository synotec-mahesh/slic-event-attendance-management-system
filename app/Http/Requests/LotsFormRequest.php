<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LotsFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sales_no' => [
                'required',
                'integer'
            ],
            'sales_date' => [
                'required',
                'date'
            ],
            'lot_no' => [
                'integer',
            ],
            
            'estate_code' => [
                'required',
                'string'
            ],
            'selling_mark' => [
                'required',
                'string'
            ],
            'inv_no' => [
                'required',
                'string'
            ],
            'grade' => [
                'required',
                'string'
            ],
            'packing' => [
                'required',
                'integer'
            ],
            'ches_weight' => [
                'required',
                'integer'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'catalog' => [
                'required',
                'string'
            ],
            'plantation' => [
                'required',
                'string'
            ],
        ];
    }
}

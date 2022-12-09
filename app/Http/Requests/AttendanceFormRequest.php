<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceFormRequest extends FormRequest
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
            'advisor_code'     => [
                'nullable',
                'string',
            ],
            'bancassurance_sales_officer'     => [
                'nullable',
                'string',
            ],
            'team_leader'     => [
                'nullable',
                'string',
            ],
            'group_leader'     => [
                'nullable',
                'string',
            ],
            'marketing_executive'     => [
                'nullable',
                'string',
            ],
            'branch_manager'     => [
                'nullable',
                'string',
            ],
            'regional_manager'     => [
                'nullable',
                'string',
            ],
            'head_office_unit'     => [
                'nullable',
                'string',
            ],
            'name'     => [
                'required',
                'string',
            ],
            'nic'     => [
                'required',
                'string',
            ],
            'branch'     => [
                'required',
                'string',
            ],
            'region'     => [
                'required',
                'string',
            ],
            'table_no'     => [
                'required',
                'string',
            ],
            'chek_in_time'     => [
                'nullable',
                'string',
            ],
        ];
    }
}

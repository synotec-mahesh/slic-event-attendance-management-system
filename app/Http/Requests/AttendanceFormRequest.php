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
           
            'team_leader'     => [
                'nullable',
                'string',
            ],
            'group_leader'     => [
                'nullable',
                'string',
            ],
            
            'epf'     => [
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
            'chek_in_time'     => [
                'nullable',
                'string',
            ],
            'table_no'     => [
                'required',
                'string',
            ],
            
        ];
    }
}

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
                'required',
                'string',
            ],
            'team_leader_code'     => [
                'required',
                'string',
            ],
            'group_leader_code'     => [
                'required',
                'string',
            ],
            'epf'     => [
                'required',
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
                'required',
                'string',
            ],
            'table_no'     => [
                'required',
                'string',
            ],
        ];
    }
}

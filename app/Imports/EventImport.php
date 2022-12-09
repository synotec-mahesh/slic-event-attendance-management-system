<?php

namespace App\Imports;

use App\Models\Attendance;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class EventImport implements ToCollection, WithValidation
{

    public function  __construct($event_id)
    {
        $this->event_id= $event_id;
       
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data = [

                'advisor_code' => $row[0],
                'bancassurance_sales_officer' => $row[1],
                'team_leader' => $row[2],
                'group_leader' => $row[3],
                'marketing_executive' => $row[4],
                'branch_manager' => $row[5],
                'regional_manager' => $row[6],
                'head_office_unit' => $row[7],
                'name' => $row[8],
                'nic' => $row[9],
                'branch' => $row[10],
                'region' => $row[11],
                'table_no' => $row[12],
                'chek_in_time' => $row[13],
               'event_id' =>$this->event_id,

            ];

            
            Attendance::create($data);
        }
    }

    public function rules(): array
    {
        return [
            '0' => 'nullable',
            '1' => 'nullable',
            '2' => 'nullable',
            '3' => 'nullable',
            '4' => 'nullable',
            '5' => 'nullable',
            '6' => 'nullable',
            '7' => 'nullable',
            '8' => 'required',
            '9' => 'required',
            '10' => 'required',
            '11' => 'required',
            '12' => 'required',
            '13' => 'nullable',
            'event_id'=>'nullable',
        ];
    }
    
}

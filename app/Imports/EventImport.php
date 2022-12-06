<?php

namespace App\Imports;

use App\Models\Attendance;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EventImport implements ToCollection, WithHeadingRow,WithValidation
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

                'advisor_code' => $row['advisor_code'],
                'team_leader_code' => $row['team_leader_code'],
                'group_leader_code' => $row['group_leader_code'],
                'epf' => $row['epf'],
                'name' => $row['name'],
                'nic' => $row['nic'],
                'branch' => $row['branch'],
                'region' => $row['region'],
                'chek_in_time' => $row['chek_in_time'],
                'table_no' => $row['table_no'],
               'event_id' =>$this->event_id,

            ];

            
            Attendance::create($data);
        }
    }

    public function rules(): array
    {
        return [
            'advisor_code' => 'required',
            'team_leader_code' => 'required',
            'group_leader_code' => 'required',
            'epf' => 'required',
            'name' => 'required',
            'nic' => 'required',
            'branch' => 'required',
            'region' => 'required',
            'chek_in_time' => 'required',
            'table_no' => 'required',
            'event_id'=>'nullable',
        ];
    }
    
}

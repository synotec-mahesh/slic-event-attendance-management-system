<?php

namespace App\Imports;

use App\Models\Attendance;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;

class EventImport implements ToCollection, WithValidation, WithChunkReading, ShouldQueue,WithStartRow
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
                'team_leader' => $row[1],
                'group_leader' => $row[2],
                'epf' => $row[3],
                'name' => $row[4],
                'nic' => $row[5],
                'branch' => $row[6],
                'region' => $row[7],
                'table_no' => $row[8],
                'chek_in_time' => $row[9],
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
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
            '8' => 'required',
            '9' => 'nullable',
            'event_id'=>'nullable',
        ];
    }

    public function startRow(): int 
    {
         return 1;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;


    protected $table = 'attendances';

    protected $fillable = [
    
        'event_id',
        'advisor_code',
        'bancassurance_sales_officer',
        'team_leader',
        'group_leader',
        'marketing_executive',
        'branch_manager',
        'regional_manager',
        'head_office_unit',
        'name',
        'nic',
        'branch',
        'region',
        'table_no',
        'chek_in_time',
       
    ];



    public function events()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }
}

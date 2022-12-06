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
        'team_leader_code',
        'group_leader_code',
        'epf',
        'name',
        'nic',
        'branch',
        'region',
        'chek_in_time',
        'table_no',
       
    ];



    public function events()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }
}

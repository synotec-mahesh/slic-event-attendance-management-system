<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    
    const STATUS_SELECT = [
        'super-admin'  => 'Super Admin',
        'admin'   => 'Admin',
        'user' => 'User',
    ];

    const STATUS_COLOR = [
        'super-admin'  => '#fa1100',
        'admin'   => '#168503',
        'user' => '#444a41',
    ];
}

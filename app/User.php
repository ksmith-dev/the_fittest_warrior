<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'user';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'unit',
        'city',
        'state',
        'zip',
        'sex',
        'age',
        'weight',
        'height',
        'b_m_i',
        'avatar_path',
        'warrior_id',
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function warriorWorkouts(){
        return $this->hasMany('App\WarriorWorkout');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarriorWorkout extends Model
{

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'warrior_workouts';

    protected $fillable = [
        'user_id',
        'workout_name',
        'hardest_hit',
        'total_power',
        'hit_count',
        'power_average',
        'workout_duration',
        'hit_speed'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

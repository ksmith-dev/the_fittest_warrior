<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Workout extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'workout';
    protected $fillable = ['session_id', 'workout_type', 'start_date_time', 'end_date_time'];

    public function session()
    {
        return $this->belongsTo('App\Session');
    }
    public function report(){
        return $this->hasOne('App\WorkoutReport');
    }
}
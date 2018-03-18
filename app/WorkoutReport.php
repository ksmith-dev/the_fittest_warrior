<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class WorkoutReport extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'workout_report';
    protected $fillable = ['workout_id', 'repetitions', 'sets', 'weight', 'weight_units', 'resistance_factor', 'calories_burned', 'duration', 'muscle_groups'];

    public function workout()
    {
        return $this->belongsTo('App\Workout');
    }
}
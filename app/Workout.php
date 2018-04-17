<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Workout extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'workout';
    protected $fillable = ['training_type', 'activity_type', 'workout_type', 'repetitions', 'sets', 'weight', 'weight_units', 'resistance_factor', 'calories_burned', 'duration', 'rest'];

}
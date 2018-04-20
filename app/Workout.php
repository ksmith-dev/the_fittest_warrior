<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Workout extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'workout';
    protected $fillable = [
        'type',
        'training_type',
        'activity_type',
        'repetitions',
        'sets',
        'weight',
        'weight_unit',
        'resistance_factor',
        'calories_burned',
        'duration',
        'rest'
    ];

}
<?php

namespace App;


class MuscleGroup
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'muscle_group';
    protected $fillable = ['workout_type', 'muscle_group'];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StayInformed extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'stay_informed';
    protected $fillable = ['email'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'healths';
    protected $fillable = ['user_id', 'ldl_cholesterol', 'fat_percentage', 'systolic_blood_pressure', 'diastolic_blood_pressure', 'hdl_cholesterol', 'start_date_time', 'end_date_time'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

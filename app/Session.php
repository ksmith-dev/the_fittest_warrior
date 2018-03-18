<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Session extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'session';
    protected $fillable = ['training_id', 'session_typ', 'start_date_time', 'end_date_time'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function training()
    {
        return $this->belongsTo('App\Training');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workouts()
    {
        return $this->hasMany('App\Workout');
    }
}
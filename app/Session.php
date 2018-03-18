<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Session extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'session';
    protected $fillable = ['session_typ', 'start_date_time', 'end_date_time'];

    private $_start_date_time;
    private $_end_date_time;
    private $_session_type;

    /**
     * @return mixed
     */
    public function getStartDateTime()
    {
        return $this->_start_date_time;
    }
    /**
     * @param mixed $start_date_time
     */
    public function setStartDateTime($start_date_time)
    {
        $this->_start_date_time = $start_date_time;
    }
    /**
     * @return mixed
     */
    public function getEndDateTime()
    {
        return $this->_end_date_time;
    }
    /**
     * @param mixed $end_date_time
     */
    public function setEndDateTime($end_date_time)
    {
        $this->_end_date_time = $end_date_time;
    }
    /**
     * @return mixed
     */
    public function getSessionType()
    {
        return $this->_session_type;
    }
    /**
     * @param mixed $session_type
     */
    public function setSessionType($session_type)
    {
        $this->_session_type = $session_type;
    }
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
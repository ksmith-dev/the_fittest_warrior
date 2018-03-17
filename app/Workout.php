<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Workout extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'workout';
    protected $fillable = ['session_id', 'workout_type', 'start_date_time', 'end_date_time'];

    private $_session_id;
    private $_start_date_time;
    private $_end_date_time;
    private $_workout_type;

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->_session_id;
    }

    /**
     * @param mixed $session_id
     */
    public function setSessionId($session_id): void
    {
        $this->_session_id = $session_id;
    }

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
    public function getWorkoutType()
    {
        return $this->_workout_type;
    }
    /**
     * @param mixed $workout_type
     */
    public function setWorkoutType($workout_type)
    {
        $this->_workout_type = $workout_type;
    }
    public function session()
    {
        return $this->belongsTo('App\Session');
    }
    public function report(){
        return $this->hasOne('App\WorkoutReport');
    }
}
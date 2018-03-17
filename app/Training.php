<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Training extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'training';
    protected $fillable = ['user_id', 'training_type', 'start_date_time', 'end_date_time', 'active_status'];

    private $_user_id;
    private $_start_date_time;
    private $_end_date_time;
    private $_active_status;
    private $_training_type;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->_user_id;
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
    public function setStartDateTime($start_date_time): void
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
    public function setEndDateTime($end_date_time): void
    {
        $this->_end_date_time = $end_date_time;
    }

    /**
     * @return mixed
     */
    public function getActiveStatus()
    {
        return $this->_active_status;
    }

    /**
     * @param mixed $active_status
     */
    public function setActiveStatus($active_status): void
    {
        $this->_active_status = $active_status;
    }

    /**
     * @return mixed
     */
    public function getTrainingType()
    {
        return $this->_training_type;
    }

    /**
     * @param mixed $training_type
     */
    public function setTrainingType($training_type): void
    {
        $this->_training_type = $training_type;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions(){
        return $this->hasMany('App\Session');
    }
}
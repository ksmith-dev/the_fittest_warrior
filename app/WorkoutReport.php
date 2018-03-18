<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class WorkoutReport extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'workout_report';
    protected $fillable = ['workout_id', 'repetitions', 'sets', 'weight', 'weight_units', 'resistance_factor', 'calories_burned', 'duration', 'muscle_groups'];

    private $_workout_id;
    private $_repetitions;
    private $_sets;
    private $_weight;
    private $_weight_units;
    private $_resistance_factor;
    private $_calories_burned;
    private $_duration;
    private $_muscle_groups = array();

    /**
     * @return mixed
     */
    public function getWorkoutId()
    {
        return $this->_workout_id;
    }

    /**
     * @param mixed $workout_id
     */
    public function setWorkoutId($workout_id): void
    {
        $this->_workout_id = $workout_id;
    }

    /**
     * @return mixed
     */
    public function getRepetitions()
    {
        return $this->_repetitions;
    }
    /**
     * @param mixed $repititions
     */
    public function setRepetitions($repititions)
    {
        $this->_repetitions = $repititions;
    }
    /**
     * @return mixed
     */
    public function getSets()
    {
        return $this->_sets;
    }
    /**
     * @param mixed $sets
     */
    public function setSets($sets)
    {
        $this->_sets = $sets;
    }
    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->_weight;
    }
    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->_weight = $weight;
    }
    /**
     * @return mixed
     */
    public function getWeightUnits()
    {
        return $this->_weight_units;
    }
    /**
     * @param mixed $weight_units
     */
    public function setWeightUnits($weight_units)
    {
        $this->_weight_units = $weight_units;
    }
    /**
     * @return mixed
     */
    public function getResistanceFactor()
    {
        return $this->_resistance_factor;
    }
    /**
     * @param mixed $resistance_factor
     */
    public function setResistanceFactor($resistance_factor)
    {
        $this->_resistance_factor = $resistance_factor;
    }
    /**
     * @return mixed
     */
    public function getCaloriesBurned()
    {
        return $this->_calories_burned;
    }
    /**
     * @param mixed $calories_burned
     */
    public function setCaloriesBurned($calories_burned)
    {
        $this->_calories_burned = $calories_burned;
    }
    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->_duration;
    }
    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->_duration = $duration;
    }
    /**
     * @return array
     */
    public function getMuscleGroups(): array
    {
        return $this->_muscle_groups;
    }
    /**
     * @param array $muscle_groups
     */
    public function setMuscleGroups(array $muscle_groups)
    {
        $this->_muscle_groups = $muscle_groups;
    }
    public function workout()
    {
        return $this->belongsTo('App\Workout');
    }
}
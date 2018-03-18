<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Training extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'training';
    protected $fillable = ['user_id', 'training_type', 'start_date_time', 'end_date_time', 'active_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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
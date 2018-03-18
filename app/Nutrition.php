<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'nutrition';
    protected $fillable = ['user_id', 'portion_size', 'gram_protein', 'gram_fat', 'gram_saturated_fat', 'cholesterol', 'sodium', 'carbohydrates', 'sugars', 'fiber', 'calories', 'start_date_time', 'end_date_time'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

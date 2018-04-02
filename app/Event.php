<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'social_feed';
    protected $fillable = ['type', 'start_date_time', 'end_date_time', 'title', 'address', 'city', 'state', 'zip', 'restriction', 'price',];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'event';
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events(){
        return $this->hasMany('App\Event');
    }
}
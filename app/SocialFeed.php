<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialFeed extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'social_feed';
    protected $fillable = ['type', 'share_date', 'comment', 'image_url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
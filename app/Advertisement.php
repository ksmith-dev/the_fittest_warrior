<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'advertisement';

    protected $fillable = [
        'user_id',
        'company_name',
        'subscription',
        'frequency',
        'pricing',
        'banner_src',
        'banner_alt',
        'message',
        'link',
        'ad_type',
        'status'
    ];
}

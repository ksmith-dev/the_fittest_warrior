<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'badge';

    protected $fillable = [
        'id',
        'name',
        'user-id',
        'img_alt',
        'img_src',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

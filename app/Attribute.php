<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'attribute';

    protected $fillable = [
        'attribute_id',
        'attribute'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'category';

    protected $fillable = [
        'category_id',
        'category'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
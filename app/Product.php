<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $table = 'product';

    protected $fillable = [
        'attribute_id',
        'sku',
        'gtin',
        'gtin_version',
        'category_id',
        'type',
        'name',
        'description',
        'price',
        'currency',
        'stock',
        'size',
        'color',
        'material',
        'max_sale',
        'image_url'
    ];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function attributes()
    {
        return $this->hasMany('App\Attribute');
    }
}
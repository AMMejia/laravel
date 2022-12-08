<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Relationship Belongs To Address
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'image' => '/images/products/order.png'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cost',
        'existences',
        'availables',
        'category',
        'image',
        'measurement',
        'unit',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'category_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Cost Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getCostAttribute($value)
    {
        return floatval($value);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cost',
        'products'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    /**
     * Node Location Longitude Attribute
     *
     * @param  string  $value
     * @return float
     */
    public function getProductsAttribute($value)
    {
        return json_decode($value);
    }

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

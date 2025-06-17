<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategory extends Model
{
    protected $fillable = [
        'title',
        'slug'
    ];

    public function products()
    {
        return $this->hasMany(Products::class, 'product_categories_id');
    }
    public function category()
    {
        return $this->hasMany(ProductSuppliers::class);
    }
}

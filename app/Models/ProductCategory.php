<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{   
    use HasFactory;

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

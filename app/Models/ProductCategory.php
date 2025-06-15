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

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function category()
    {
        return $this->hasMany(ProductSuppliers::class);
    }
}

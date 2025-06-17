<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSuppliers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'category_id'
     ];

     public function products()
    {
        return $this->hasMany(Products::class, 'product_suppliers_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'quantity',
        'product_categories_id',
        'product_suppliers_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(ProductSuppliers::class, 'product_suppliers_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_categories_id');
    }
}

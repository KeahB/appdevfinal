<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSuppliers extends Model
{
    use HasFactory;
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

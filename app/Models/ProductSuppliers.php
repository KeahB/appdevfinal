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

     public function product()
    {
        return $this->belongsTo(ProductSuppliers::class);
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}

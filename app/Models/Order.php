<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status', // e.g., pending, completed, cancelled
    ];

    /**
     * The user who placed the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The product being ordered.
     */
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    /**
     * Optionally format created_at as human-readable (e.g. "3 hours ago").
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];
}

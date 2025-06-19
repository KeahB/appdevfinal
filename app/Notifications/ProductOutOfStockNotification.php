<?php

namespace App\Notifications;

use App\Models\Products;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProductOutOfStockNotification extends Notification
{
    use Queueable;

    public $product;

    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['database']; // you can add 'mail' here if needed
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Product '{$this->product->name}' is now out of stock.",
            'product_id' => $this->product->id,
        ];
    }
}

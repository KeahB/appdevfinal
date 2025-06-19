<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductOrderedNotification extends Notification
{
    use Queueable;

    public $user, $product, $quantity;

    public function __construct($user, $product, $quantity)
    {
        $this->user = $user;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function via($notifiable)
    {
        return ['database']; // stores notification in DB
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "{$this->user->name} ordered {$this->quantity} pcs of {$this->product->name}.",
        ];
    }
    public function toArray($notifiable)
    {
    return [
        'message' => "{$this->user->name} ordered {$this->quantity} of {$this->product->name}",
        'user_name' => $this->user->name,
        'product_name' => $this->product->name,
        'quantity' => $this->quantity,
        'order_id' => $this->order->id ?? null,
    ];
    }

}

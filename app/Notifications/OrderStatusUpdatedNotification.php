<?php
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\Order;

class OrderStatusUpdatedNotification extends Notification
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Your order for {$this->order->product->name} was {$this->order->status}.",
            'order_id' => $this->order->id,
        ];
    }
}

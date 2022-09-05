<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendProductUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    private $product;
    public function __construct($data)
    {
        $this->product = $data;
    }

    public function broadcastOn()
    {
        return new Channel('update-product');
    }

    public function broadcastAs()
    {
        return 'update.product';
    }

    public function broadcastWith()
    {
        return [
            'product' => $this->product,
        ];
    }
}

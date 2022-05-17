<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;



class PrivateMessages implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $privateMessage; 

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($privateMessage)
    {
        $this->privateMessage = $privateMessage; 
    }


    public function broadcastWith(){
        return $this->privateMessage; 
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('privateChat');
    }
}

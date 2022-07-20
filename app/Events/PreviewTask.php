<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PreviewTask implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public string $title;
    public string $desc;
    public string $status;
    public string $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $title, string $desc, string $status , string $message)
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->status = $status;
        $this->message= $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('public.previewtask.1');
    }
    public function broadcastWith()
    {
        return[
            "title" => $this->title,
            "desc" => $this->desc,
            "status" => $this->status,
            'message'=> $this->message
        ];
    }
}

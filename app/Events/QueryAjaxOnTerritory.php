<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class QueryAjaxOnTerritory extends Event
{
    use SerializesModels;
    public $refScale;
    public $refCode;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($refCode,$refScale)
    {
        $this->refCode = $refCode;
        $this->refScale = $refScale;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}

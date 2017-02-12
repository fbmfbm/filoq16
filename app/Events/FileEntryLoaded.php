<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FileEntryLoaded extends Event
{
    use SerializesModels;
    public $fileEntryName;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($fileEntryName)
    {
        $this->fileEntryName = $fileEntryName;
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

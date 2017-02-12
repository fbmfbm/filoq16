<?php

namespace App\Events;


use App\Events\Event;
use App\FileEntry;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FileEntryDeleted extends Event
{
    use SerializesModels;
    public $fileEntry;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(FileEntry $fileEntry)
    {
        $this->fileEntry = $fileEntry;
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

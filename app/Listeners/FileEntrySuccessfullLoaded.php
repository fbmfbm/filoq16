<?php

namespace App\Listeners;

use App\Events\FileEntryUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FileEntrySuccessfullLoaded
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FileEntry  $event
     * @return void
     */
    public function handle(FileEntryUpda $event)
    {
        //
    }
}

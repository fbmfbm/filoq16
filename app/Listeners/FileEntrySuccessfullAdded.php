<?php

namespace App\Listeners;

use App\Events\FileEntryUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FileEntrySuccessfullAdded
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
    public function handle(FileEntryUpdated $event)
    {
        $this->user = Auth::user();

        $logUser = new LogStat();
        $logUser->name = "FileEntry_Added";
        $logUser->type = "FileEntry";
        $logUser->description = " Ajout du fichier ".$event->file->name." par l'utilisateur ".$this->user->name;
        $logUser->user_name = $this->user->name;
        $logUser->user_id = $this->user->id;
        $logUser->user_ip = $_SERVER['REMOTE_ADDR'];

        $logUser->save();

    }
}

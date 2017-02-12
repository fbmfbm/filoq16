<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
         'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
            ],
        'App\Events\UserAdded' => [
            'App\Listeners\LogUserAdded',
        ],
        'App\Events\UserDeleted' => [
            'App\Listeners\LogUserDeleted',
        ],
        'App\Events\FileEntryAdded' => [
            'App\Listeners\LogFileEntryAdded',
        ],
        'App\Events\FileEntryLoaded' => [
            'App\Listeners\LogFileEntryDownloadByUser',
        ],
        'App\Events\FileEntryDeleted' => [
            'App\Listeners\LogFileEntryDeleted',
        ],
        'App\Events\QueryAjaxOnTerritory' => [
            'App\Listeners\LogQueryAjaxForTerritory',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        $events->listen('event.*', function (array $data) {
            //
        });
    }
}

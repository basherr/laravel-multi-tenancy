<?php

namespace App\Listeners;

use DB;
use App\Events\NewSiteWasRegistered;
use Orchestra\Support\Facades\Tenanti;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateDatabase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  NewSiteRegistered  $event
     * @return void
     */
    public function handle(NewSiteWasRegistered $event)
    {
        $schemaName = 'mybuild_' . $event->site->id;

        DB::statement('CREATE DATABASE ' . $schemaName);

        Tenanti::driver('mu')->asDefaultConnection( $event->site, 'mybuild_{id}');

        \Artisan::call( 'tenanti:migrate', ['driver' => 'mu']);
    }
}

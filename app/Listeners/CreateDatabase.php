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

        $this->create_tables();
    }
    /**
     * Create tables in database
     *
     * @param null
     * @return null
     */
    public function create_tables($value='')
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `posts`  (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `post_title` varchar(250) NOT NULL,
              `post_content` varchar(1000) NOT NULL,
              `post_type` varchar(100) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;';

        DB::connection()->statement( $sql );
    }
}

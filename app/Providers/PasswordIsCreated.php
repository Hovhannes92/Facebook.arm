<?php

namespace App\Providers;

use App\Providers\PasswordCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordIsCreated
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
     * @param  PasswordCreate  $event
     * @return void
     */
    public function handle(PasswordCreate $event)
    {

    }
}

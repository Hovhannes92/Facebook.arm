<?php

namespace App\Listeners;

use App\Events\UserSaving;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordBcryption
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
     * @param  UserSaving  $event
     * @return void
     */
    public function handle(UserSaving $event)
    {
        $event->user->password = bcrypt($event->user->password);
    }
}

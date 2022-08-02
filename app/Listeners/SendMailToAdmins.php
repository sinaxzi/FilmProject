<?php

namespace App\Listeners;

use App\Events\CreateMovie;
use App\Mail\MarkDownMail;
use App\Mail\UpdateEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailToAdmins implements ShouldQueue
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
     * @param  \App\Events\CreateMovie  $event
     * @return void
     */
    public function handle(CreateMovie $event)
    {
        foreach ($event->admin_users as $admin_user) {
            Mail::send(new UpdateEmail($event->user, $event->movie, $admin_user));
            
            sleep(1);
        }
    }
}

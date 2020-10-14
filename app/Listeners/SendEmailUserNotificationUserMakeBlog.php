<?php

namespace App\Listeners;

use App\Events\UserMakeBlog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserNotificationMail;

class SendEmailUserNotificationUserMakeBlog implements ShouldQueue
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
     * @param  UserMakeBlog  $event
     * @return void
     */
    public function handle(UserMakeBlog $event)
    {
        //
        Mail::to($event->user)->send(new UserNotificationMail($event->user,$event->blog));
    }
}

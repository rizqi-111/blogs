<?php

namespace App\Listeners;

use App\Events\AdminVerifBlog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserPublishNotificationMail;

class SendEmailUserNotificationBlogHasVerified implements ShouldQueue
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
     * @param  AdminVerifBlog  $event
     * @return void
     */
    public function handle(AdminVerifBlog $event)
    {
        //        
        Mail::to($event->user)->send(new UserPublishNotificationMail($event->user,$event->blog));
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Blog;
use App\User;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Blog $blog, $admin)
    {
        //
        $this->blog = $blog;
        $this->user = $user;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
                    ->view('admin_email_notif')
                    ->with([
                        'nama' => $this->user->name,
                        'judul' => $this->blog->title,
                        'admin' => $this->admin->name
                        ]);
    }
}

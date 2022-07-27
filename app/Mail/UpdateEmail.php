<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $movie;
    public $admin_user;
    public function __construct($user,$movie,$admin_user)
    {
        $this->user = $user;
        $this->movie = $movie;
        $this->admin_user = $admin_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build()
    {
        return $this->subject('updating movie')
            ->from('sina@example.com')
            ->to($this->admin_user->email)
            ->view('mail.updateMovieEmail', ['user' => $this->user, 'movie' => $this->movie]);
    }

}

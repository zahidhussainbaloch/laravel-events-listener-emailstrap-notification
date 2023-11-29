<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Events\UserCreated;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
// use Mail;
class NotifyUser
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
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $users = User::get();

        foreach ( $users as $user){

            Mail::to($user->email)->send(new UserMail($event->user));
        }
    }
}

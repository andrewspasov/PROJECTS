<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\ActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class SendActivationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event)
    {
        Cache::put('user_activation_' . $event->user->id, now()->addMinutes(2), 120);
    
        $activationUrl = url("/validation/{$event->user->token}?email=" . urlencode($event->user->email));
    
        Mail::to($event->user->email)->send(new ActivationEmail($event->user, $activationUrl));
    }
}

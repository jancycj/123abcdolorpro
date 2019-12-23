<?php

namespace App\Listeners;

use App\Events\VacancyCreated;
use App\Notifications\InvoicePaid;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

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
     * @param  VacancyCreated  $event
     * @return void
     */
    public function handle(VacancyCreated $event)
    {
        return Notification::send(User::whereIn('id',[2,3])->get(),new InvoicePaid());
    }
}

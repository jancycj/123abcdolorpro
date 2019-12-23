<?php

namespace App\Listeners;

use App\Traits\SendMail;
use App\Events\OrderShipped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\InvoicePaid;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendShipmentNotification implements ShouldQueue
{
    use SendMail;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {

        // $event1 = $this->test();
        $data['title'] = 'test';
        $data['content'] = 'test content';
        // return ($event1);
        // Mail::send('Mail.mail', $data, function ($message) {
        //     $message->from('john@johndoe.com', 'John Doe');
        //     $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to('sajeer.logezy@gmail.com', 'John Doe');
        //     $message->cc('sajeervsaleem@gmail.com', 'John Doe');
        //     $message->bcc('sajeervasaleem@gmail.com', 'John Doe');
        //     $message->replyTo('john@johndoe.com', 'John Doe');
        //     $message->subject('Subject demo');
        //     $message->priority(3);
        //     // $message->attach('pathToFile');
        // });
        return Notification::send(User::whereIn('id',[2,3])->get(),new InvoicePaid());
    }
}

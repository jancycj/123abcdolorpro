<?php

namespace App\Notifications;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;

class InvoicePaid extends Notification implements ShouldQueue
{
    use Queueable,SerializesModels;
    public $data =['title'=>'test mail from events','content'=>'test content from events'];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
          $db = session('slug');
          config(['database.connections.tenant.database' => $db]);
        
          DB::purge('tenant');
        
          DB::reconnect('tenant');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
    
        $pdf = PDF::loadView('pdf', $this->data);
        $pdf = $pdf->stream('invoice.pdf');
        $data['pdf'] = $pdf;
        return (new MailMessage)
            ->view(
                'Mail.mail', ['data' => $this->data]
            )->attachData($pdf, 'name.pdf', [
                'mime' => 'application/pdf',
            ]);
       
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
   
    
}

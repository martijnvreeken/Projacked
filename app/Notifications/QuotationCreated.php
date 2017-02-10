<?php

namespace Projacked\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QuotationCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Uw aangevraagde offerte is gereed')
                    ->greeting(sprintf('Geachte heer/mevrouw %s,', $notifiable->client_name))
                    ->line('Uw aangevraagde offerte is gereed. Wij danken u voor uw interesse in een samenwerking met Kapibara Media.')
                    ->action('Bekijk de offerte', config('app.url') . $notifiable->quotation_uri)
                    ->line('Indien u vragen heeft, schroom niet contact met ons op te nemen!')
                    ->line('Ons aanbod is 21 dagen geldig. Indien de offerte akkoord is, kunt u deze direct <a href="http://localhost:8000/">akkoord geven</a> via onze website.');

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

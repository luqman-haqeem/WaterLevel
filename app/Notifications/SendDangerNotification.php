<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;

class SendDangerNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $station; 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($station)
    {
        //
        $this->station = $station;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toOneSignal($notifiable)
    {

        return OneSignalMessage::create()
            ->setSubject("Danger Alert")
            ->setBody("{$this->station->station_name} reached a danger level!")
            ->setUrl(env('APP_URL', 'https://water-level.onrender.com/stations')."/{$this->station->id}")
            ->webButton(
                OneSignalWebButton::create('link-1')
                    ->text('See Other Stations')
                    ->icon('https://cdn-icons-png.flaticon.com/512/223/223476.png')
                    ->url(env('APP_URL', 'https://water-level.onrender.com/stations').'/stations')
            );
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

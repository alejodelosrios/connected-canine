<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PetCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public $pet;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pet)
    {
        $this->pet = $pet;
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
            ->from('notifications@connectedcanine.com')
            ->subject('New Pet Registered by: ' . $this->pet->owner->fullName)
            ->line('A new pet was registered')
            ->line('Pet Name: ' . $this->pet->name);
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

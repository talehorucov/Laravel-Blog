<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ForgotPasswordNotification extends Notification
{
    use Queueable;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
    public function toMail(User $user)
    {
        $this->user = $user;
        return (new MailMessage)
                    ->line('Şifrənizi dəyişmək üçün aşağıdakı linkə keçid edin. Əgər bunu siz etməmişsinizsə linkə keçid etməyin.')
                    ->action('Şifrəmi Yenilə', route('user.change.forgotpassword',$user->id))
                    ->line('Bizi seçdiyiniz üçün təşəkkürlər.');
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
            'user' => $this->user['id']
        ];
    }
}

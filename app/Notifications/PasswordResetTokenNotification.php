<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetTokenNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $token)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Demande de réinitialisation de mot de passe')
                    ->line("Hello, {$notifiable->fullname} !,")
                    ->line('Votre demande de réinitialisation de mot de passe a été traitée. Veuillez cliquer sur le lien ci-dessous pour définir un nouveau mot de passe.')
                    ->action('Réinitialiser mon mot de passe', env('FRONTEND_URL'). '/auth/reset-password' .'?token='.$this->token.'&email='.$notifiable->email)
                    ->line('Si vous n\'avez pas fait cette demande de réinitialisation de mot de passe, veuillez ignorer ce message.')
                    ->line('L\'équipe PLAN\'IA.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

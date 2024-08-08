<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        $this->registerPolicies();
        //
        VerifyEmail::toMailUsing(function($notifiable, $url) {
            return (new MailMessage)
            ->subject('Verificar cuenta')
            ->line('Tu cuenta ya esta casi lista, solo debe dar click en el siguiente enlace')
            ->action('Confirmar Cuenta', $url)
            ->line('Si no creaste esta cuenta, puedes ignorar este mensaje.');
        });
    }
}

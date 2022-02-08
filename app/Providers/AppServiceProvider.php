<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(190);
        VerifyEmail::toMailUsing(function($notifiable,$url){
                return(new MailMessage)
                ->subject('ایمیل فعالسازی حساب کاربری')
                ->line('سلااااام حالت چطوره؟؟؟')
                ->view('email.EmailVerify',compact('notifiable','url'));
        });
    }
}

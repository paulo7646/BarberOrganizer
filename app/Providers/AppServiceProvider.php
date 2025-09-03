<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use BezhanSalleh\LanguageSwitch\LanguageSwitch;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['pt_BR', 'en', 'fr'])
                ->flags([
                    'pt_BR' => asset('/public/Images/svg/br.svg'),
                    'en' => asset('/public/Images/svg/usa.svg'),
                ]);
        });
    }
}

<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerLogoutHandler(function () {
                Auth::logout();

                return redirect('/'); // arahkan ke landing page kamu
            });
        });
    }
}

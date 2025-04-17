<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Queste azioni gestiscono la creazione e aggiornamento utente
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // Limiti di rate limiting per login e 2FA
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(
                Str::lower($request->input(Fortify::username())).'|'.$request->ip()
            );

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        /*
         |--------------------------------------------------------------------------
         | Viste personalizzate per Login, Registrazione, Reset Password
         |--------------------------------------------------------------------------
         | Se nei tuoi blade hai "auth.login", "auth.register" e "auth.passwords.email",
         | puoi abilitare le route e collegarle a queste viste.
         |
         | /login -> Fortify::loginView
         | /register -> Fortify::registerView
         | /forgot-password -> Fortify::requestPasswordResetLinkView
         */
        
        // Vista login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Vista registrazione
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Vista per l'invio email reset password
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });
        
        // (Facoltativo) Vista per effettuare il reset effettivo della password
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class JetstreamServiceProvider extends ServiceProvider
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
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            $input['domain'] = Str::after($request->email, '@');
            if ($input['domain'] <> "connectedcanine.com") {
                Validator::make(
                    $input,
                    [
                        "domain" => Rule::exists('accounts')->where(function ($query) use ($input) {
                            return $query->where('domain', $input['domain'])->where('deleted_at', null)->count() > 0;
                        })
                    ],
                    [
                        'domain.*' => 'The domain you are trying to register is suspended or not subscribed'
                    ]
                )->validate();
            }

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                return $user;
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}

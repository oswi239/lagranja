<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Empresa;
use Illuminate\Support\ServiceProvider;

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
        $empresa = Empresa::first();
        $year = Carbon::now()->endOfYear()->format('Y');
        if ($empresa) {
            $imagen =

                [
                    'imagen' => $empresa->img,
                    'name' => $empresa->name,

                ];
        } else {
            $imagen =

                [
                    'imagen' => asset('dist/img/la laguna .png'),
                    'name' => 'La Laguna',

                ];
        }

        $imagen['year'] = $year;

        view()->Composer('layouts.app', function ($view) use ($imagen) {

            $view->with([
                'mensaje' => $imagen,
            ]);
        });
        view()->Composer('login.login', function ($view) use ($imagen) {
            $view->with([
                'mensaje' => $imagen,
            ]);
        });
    }
}
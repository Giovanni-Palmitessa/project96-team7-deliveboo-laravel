<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'qpd72yyd9wbs3d5d',
                    'publicKey' => 'ncvpb24zc5ytrf7q',
                    'privateKey' => '8d43bd2326a9babaf0fcfcc72787048d'
                ]
            );
        });
    }
}

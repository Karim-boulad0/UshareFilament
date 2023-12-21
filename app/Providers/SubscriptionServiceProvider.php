<?php

namespace App\Providers;

use App\Models\Subscription;
use Illuminate\Support\ServiceProvider;
use App\Filament\Resources\SubscriptionResource;

class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SubscriptionResource::class, function ($app) {
            return new SubscriptionResource(new Subscription());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

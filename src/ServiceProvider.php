<?php

namespace DraperStudio\SweetFlash;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'sweet-flash';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishViews()
             ->loadViews();
    }

    public function register()
    {
        $this->app->singleton('sweet-flash', function ($app) {
            return new Notifier($app['session.store']);
        });
    }
}

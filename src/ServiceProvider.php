<?php

/*
 * This file is part of Laravel Sweet Flash.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\SweetFlash;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends BaseProvider
{
    /**
     * @var string
     */
    protected $packageName = 'sweet-flash';

    /**
     *
     */
    public function boot()
    {
        $this->setup(__DIR__)
             ->publishViews()
             ->loadViews();
    }

    /**
     *
     */
    public function register()
    {
        $this->app->singleton('sweet-flash', function ($app) {
            return new Notifier($app['session.store']);
        });
    }
}

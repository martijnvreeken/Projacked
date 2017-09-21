<?php

namespace Projacked\Providers;

use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Monolog\Handler\SlackWebhookHandler;

class SlackLoggingProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $config = config('monolog');
        if($config['active'] === true) {
            $monolog = \Log::getMonolog();
            $monolog->pushHandler(new SlackWebhookHandler(
                    $config['webhook'],
                    $config['channel'], $config['username'],
                    $config['useAttachment'], $config['iconEmoji'],
                    true, true, $config['level']
                )
            );
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

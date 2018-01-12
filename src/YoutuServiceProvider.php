<?php

namespace Huantu\LaravelYoutu;

use Illuminate\Support\ServiceProvider;

class YoutuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('youtu.php'),
        ], 'config');
    }

    public function register()
    {
        $this->app->singleton('youtu', function () {
            return new Youtu;
        });

        $this->mergeConfig();
    }

    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'youtu'
        );
    }
}
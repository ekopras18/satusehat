<?php

namespace Ekopras18\Satusehat;

use Illuminate\Support\ServiceProvider;

class SatusehatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish Config
        $this->publishes([
            __DIR__.'/config/satusehat.php' => config_path('satusehat.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/config/satusehat.php', 'satusehat');
    }

    public function register()
    {
        //
    }
}
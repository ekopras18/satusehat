<?php

namespace Ekopras18\Satusehat;

use Illuminate\Support\ServiceProvider;

class SatusehatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish Config
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__.'/config/satusehat.php' => config_path('satusehat.php'),
            __DIR__.'/database/migrations/create_ss_token_table.php.stub' => database_path("/migrations/{$timestamp}_create_ss_token_table.php"),
        ], 'satusehat');

        $this->mergeConfigFrom(__DIR__.'/config/satusehat.php', 'satusehat');
    }

    public function register()
    {
        //
    }
}
<?php

namespace Ekopras18\Satusehat;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class SatusehatServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish Config
        $this->publishConfig();
        $this->publishMigrations();
    }

    public function register()
    {
        //
    }

    private function publishConfig()
    {
        $configPath = __DIR__ . '/config/satusehat.php';
        $this->publishes([$configPath => config_path('satusehat.php')], 'satusehat');
        $this->mergeConfigFrom($configPath, 'satusehat');
    }

    private function publishMigrations()
    {
        $timestamp = date('Y_m_d_His');
        $migrationStubPath = __DIR__ . '/database/migrations/';

        $this->publishMigration('CreateSsTokenTable', $timestamp, $migrationStubPath . 'create_ss_token_table.php.stub');
        $this->publishMigration('CreateSsOrganizationTable', $timestamp, $migrationStubPath . 'create_ss_organization_table.php.stub');
    }

    private function publishMigration($className, $timestamp, $stubPath)
    {
        if (!class_exists($className)) {
            $this->publishes([
                $stubPath => database_path("/migrations/{$timestamp}_" . Str::snake($className) . ".php"),
            ], 'satusehat');
        }
    }
}

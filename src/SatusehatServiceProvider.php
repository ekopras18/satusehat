<?php

namespace Ekopras18\Satusehat;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * Class SatusehatServiceProvider
 *
 * This class provides methods to handle the booting and registering of the Satusehat service.
 */
class SatusehatServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * This method is called after all other service providers have been registered, meaning you have access to all other services.
     */
    public function boot()
    {
        // Publish Config
        $this->publishConfig();
        $this->publishMigrations();
    }

    /**
     * Register the service provider.
     *
     * This method is called after all other service providers have been registered, meaning you have access to all other services.
     */
    public function register()
    {
        //
    }

    /**
     * Publish the configuration file.
     *
     * This method is used to publish the configuration file to the application's config directory.
     */
    private function publishConfig()
    {
        $configPath = __DIR__ . '/config/satusehat.php';
        $this->publishes([$configPath => config_path('satusehat.php')], 'satusehat');
        $this->mergeConfigFrom($configPath, 'satusehat');
    }

    /**
     * Publish the migration files.
     *
     * This method is used to publish the migration files to the application's database/migrations directory.
     */
    private function publishMigrations()
    {
        $timestamp = date('Y_m_d_His');
        $migrationStubPath = __DIR__ . '/database/migrations/';

        $this->publishMigration('CreateSsTokenTable', $timestamp, $migrationStubPath . 'create_ss_token_table.php.stub');
        $this->publishMigration('CreateSsOrganizationTable', $timestamp, $migrationStubPath . 'create_ss_organization_table.php.stub');
    }

    /**
     * Publish a migration file.
     *
     * @param string $className The name of the migration class.
     * @param string $timestamp The current timestamp.
     * @param string $stubPath The path to the migration stub file.
     */
    private function publishMigration($className, $timestamp, $stubPath)
    {
        if (!class_exists($className)) {
            $this->publishes([
                $stubPath => database_path("/migrations/{$timestamp}_" . Str::snake($className) . ".php"),
            ], 'satusehat');
        }
    }
}
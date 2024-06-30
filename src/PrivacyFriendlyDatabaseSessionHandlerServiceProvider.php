<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler;

use Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands\OrchestraSessionTableCommand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Session;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PrivacyFriendlyDatabaseSessionHandlerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-database-privacy')
            ->hasRoute('web')
            ->hasCommand(SessionTableCommand::class);
    }

    public function registeringPackage(): void
    {

        if (class_exists("Orchestra\Canvas\Console\SessionTableCommand")) {
            $this->app->bind(\Orchestra\Canvas\Console\SessionTableCommand::class, function (Application $app) {
                return new OrchestraSessionTableCommand($app['files']);
            });
        }
    }

    public function boot(): PackageServiceProvider
    {
        $provider = parent::boot();

        Session::extend('database', function (Application $app) {
            $lifetime = $app['config']->get('session.lifetime');
            $table = $app['config']->get('session.table');
            $connection = $app['db']->connection($app['config']->get('session.connection'));

            return new PrivacyFriendlyDatabaseSessionHandler($connection, $table, $lifetime, $app);
        });

        return $provider;
    }
}

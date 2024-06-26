<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands\PrivacyFriendlyDatabaseSessionHandlerCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-database-privacy_table')
            ->hasCommand(PrivacyFriendlyDatabaseSessionHandlerCommand::class);
    }
}

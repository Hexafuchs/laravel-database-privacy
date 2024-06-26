<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\PrivacyFriendlyDatabaseSessionHandlerServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Hexafuchs\\PrivacyFriendlyDatabaseSessionHandler\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            PrivacyFriendlyDatabaseSessionHandlerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-database-privacy_table.php.stub';
        $migration->up();
        */
    }
}

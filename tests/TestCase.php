<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Tests;

use Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\PrivacyFriendlyDatabaseSessionHandlerServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Filesystem\Filesystem;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    use WithWorkbench;

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
        config()->set('database.connections.testing.driver', 'sqlite');
        config()->set('database.connections.testing.database', __DIR__.'/test.db');
        (new Filesystem())->replace(__DIR__.'/test.db', '');
        config()->set('session.driver', 'database');
    }
}

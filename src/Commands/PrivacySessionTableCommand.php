<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands;

use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:privacy-session-table', aliases: ['session:privacy-table'])]
class PrivacySessionTableCommand extends \Illuminate\Session\Console\SessionTableCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:privacy-session-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the session table for the GDPR compliant database session handler';

    /**
     * Get the path to the migration stub file.
     */
    protected function migrationStubFile(): string
    {
        return __DIR__.'/stubs/sessionTable.stub';
    }
}

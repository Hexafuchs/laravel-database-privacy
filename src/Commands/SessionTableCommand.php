<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands;

use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:privacy-session-table', aliases: ['session:privacy-table'])]
class SessionTableCommand extends \Illuminate\Session\Console\SessionTableCommand
{
    /**
     * Get the path to the migration stub file.
     */
    protected function migrationStubFile(): string
    {
        return __DIR__.'/stubs/sessionTable.stub';
    }
}

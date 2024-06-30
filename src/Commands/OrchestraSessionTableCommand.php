<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands;

use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:session-table', aliases: ['session:table'])]
class OrchestraSessionTableCommand extends \Orchestra\Canvas\Console\SessionTableCommand
{
    /**
     * Get the path to the migration stub file.
     */
    protected function migrationStubFile(): string
    {
        return __DIR__.'/stubs/sessionTable.stub';
    }
}

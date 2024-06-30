<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands;

use Symfony\Component\Console\Attribute\AsCommand;
use function Illuminate\Filesystem\join_paths;

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

    protected function migrationExists($table)
    {
        return count($this->files->glob(
                join_paths($this->laravel->databasePath('migrations'), '*_*_*_*_create_'.$table.'_table.php')
            )) !== 0;
    }
}

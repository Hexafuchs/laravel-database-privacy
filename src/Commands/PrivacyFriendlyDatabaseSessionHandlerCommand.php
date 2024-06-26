<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands;

use Illuminate\Console\Command;

class PrivacyFriendlyDatabaseSessionHandlerCommand extends Command
{
    public $signature = 'laravel-database-privacy';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

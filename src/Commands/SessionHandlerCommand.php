<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Commands;

use Symfony\Component\Console\Attribute\AsCommand;

use Illuminate\Console\Command;

#[AsCommand(name: 'session:handler')]
class SessionHandlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:handler';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns the session handler';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info(get_class(session()->getHandler()));

        return self::SUCCESS;
    }
}

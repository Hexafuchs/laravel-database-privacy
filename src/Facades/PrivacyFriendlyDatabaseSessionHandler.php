<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\PrivacyFriendlyDatabaseSessionHandler
 */
class PrivacyFriendlyDatabaseSessionHandler extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\PrivacyFriendlyDatabaseSessionHandler::class;
    }
}

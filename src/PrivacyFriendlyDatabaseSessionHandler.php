<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler;

use Illuminate\Session\DatabaseSessionHandler;

class PrivacyFriendlyDatabaseSessionHandler extends DatabaseSessionHandler
{
    /**
     * This method overwrites the base method. It does not add anything.s
     */
    protected function addRequestInformation(&$payload): static
    {
        return $this;
    }
}

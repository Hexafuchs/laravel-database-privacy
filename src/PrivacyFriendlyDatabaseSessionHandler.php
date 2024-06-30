<?php

namespace Hexafuchs\PrivacyFriendlyDatabaseSessionHandler;

use Illuminate\Session\DatabaseSessionHandler;

class PrivacyFriendlyDatabaseSessionHandler extends DatabaseSessionHandler
{
    /**
     * Add the request information to the session payload.
     *
     * @param  array  $payload
     * @return $this
     */
    protected function addRequestInformation(&$payload): static
    {
        return $this;
    }
}

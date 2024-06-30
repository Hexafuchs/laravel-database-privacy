<?php

arch('it will not use debugging functions')
    ->expect(['dd', 'dump', 'ray', 'debug_print_backtrace', 'debug_backtrace'])
    ->each->not->toBeUsed();

<?php

namespace App\Bootstrap;

use Illuminate\Contracts\Foundation\Application;

/**
 * Re-apply error_reporting to suppress E_DEPRECATED after HandleExceptions sets -1.
 * Needed on PHP 8.4+ where vendor packages trigger implicit-nullable deprecations.
 */
class SuppressDeprecations
{
    public function bootstrap(Application $app): void
    {
        if (PHP_VERSION_ID >= 80400) {
            error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        }
    }
}

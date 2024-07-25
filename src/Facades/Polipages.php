<?php

namespace Detit\Polipages\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Detit\Polipages\Polipages
 */
class Polipages extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Detit\Polipages\Polipages::class;
    }
}

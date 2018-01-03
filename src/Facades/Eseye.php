<?php

namespace MichaelCooke\LaravelEseye\Facades;

use Illuminate\Support\Facades\Facade;

class Eseye extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'eseye';
    }
}

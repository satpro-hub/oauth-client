<?php

namespace Satpro\JWTClient;

use Illuminate\Support\ServiceProvider;
use Satpro\JWTClient\Console\Commands\GetPublicKeyCommand;

class JWTClientServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->commands([
            GetPublicKeyCommand::class,
        ]);
    }
}

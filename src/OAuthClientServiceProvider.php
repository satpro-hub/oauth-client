<?php

namespace Satpro\OAuthClient;

use Illuminate\Support\ServiceProvider;
use Satpro\OAuthClient\Console\Commands\GetPublicKeyCommand;

class OAuthClientServiceProvider extends ServiceProvider
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

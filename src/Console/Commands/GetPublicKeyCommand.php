<?php

namespace Satpro\JWTClient\Console\Commands;

use Illuminate\Console\Command;
use Satpro\JWTClient\Services\JWTService;

class GetPublicKeyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oauth:key';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Получение публичного ключа с Oauth сервера';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        JWTService::getPublicKey();
    }
}

<?php

namespace Satpro\OAuthClient\Contract;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @method static int|string|null uid()
 *
 */
interface OAuthUserInterface extends Authenticatable
{

}


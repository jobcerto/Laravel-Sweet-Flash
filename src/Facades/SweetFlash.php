<?php

/*
 * This file is part of Laravel Sweet Flash.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\SweetFlash\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class SweetFlash.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class SweetFlash extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sweet-flash';
    }
}

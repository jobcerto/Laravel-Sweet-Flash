<?php

/*
 * This file is part of Laravel SweetFlash.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Tests\SweetFlash\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use DraperStudio\Tests\SweetFlash\AbstractTestCase;
use DraperStudio\SweetFlash\Facades\SweetFlash;
use DraperStudio\SweetFlash\Notifier;

/**
 * This is the facade test class.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class SweetFlashTest extends AbstractTestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'sweet-flash';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return SweetFlash::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return Notifier::class;
    }
}

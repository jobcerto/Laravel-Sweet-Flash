<?php

/*
 * This file is part of Laravel Sweet Flash.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!function_exists('sweet')) {
    /**
     * @param null $message
     *
     * @return \Illuminate\Foundation\Application|mixed
     */
    function sweet($message = null)
    {
        $notifier = app('sweet-flash');

        if (!is_null($message)) {
            return $notifier->message($message);
        }

        return $notifier;
    }
}

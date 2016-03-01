<?php

/*
 * This file is part of Laravel Sweet Flash.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\SweetFlash;

use Illuminate\Session\Store;

/**
 * Class Notifier.
 */
class Notifier
{
    /**
     * @var Store
     */
    private $session;

    /**
     * @var array
     */
    private $config = [
        'allowOutsideClick' => true,
        'showConfirmButton' => false,
        'timer' => 1800,
    ];

    /**
     * @var
     */
    private $callback;

    /**
     * Notifier constructor.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * @param $text
     * @param string $type
     * @param string $title
     *
     * @return $this
     */
    public function message($text, $type = 'info', $title = '')
    {
        return $this->config('text', $text)
                    ->config('type', $type)
                    ->config('title', $title)
                    ->commit();
    }

    /**
     * @param $text
     * @param string $title
     *
     * @return Notifier
     */
    public function success($text, $title = '')
    {
        return $this->message($text, 'success', $title);
    }

    /**
     * @param $text
     * @param string $title
     *
     * @return Notifier
     */
    public function info($text, $title = '')
    {
        return $this->message($text, 'info', $title);
    }

    /**
     * @param $text
     * @param string $title
     *
     * @return Notifier
     */
    public function warning($text, $title = '')
    {
        return $this->message($text, 'warning', $title);
    }

    /**
     * @param $text
     * @param string $title
     *
     * @return Notifier
     */
    public function error($text, $title = '')
    {
        return $this->message($text, 'error', $title);
    }

    /**
     * @param int $milliseconds
     *
     * @return $this
     */
    public function autoclose($milliseconds = 2000)
    {
        return $this->config('timer', $milliseconds)
                    ->commit();
    }

    /**
     * @param string $buttonText
     *
     * @return $this
     */
    public function persistent($buttonText = 'OK')
    {
        return $this->config('confirmButtonText', $buttonText)
                    ->config('showConfirmButton', true)
                    ->config('allowOutsideClick', false)
                    ->config('timer', 'null')
                    ->commit();
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function callback($value)
    {
        $this->callback = $value;

        return $this;
    }

    /**
     * @param $key
     * @param null $value
     *
     * @return $this
     */
    public function config($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->config($k, $v);
            }
        } else {
            $this->config[$key] = $value;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function commit()
    {
        foreach ($this->config as $key => $value) {
            $this->session->flash("sweet_flash.{$key}", $value);
        }

        $this->session->flash('sweet_flash.flash', json_encode($this->config));

        if (!empty($this->callback)) {
            $this->session->flash('sweet_flash.callback', $this->callback);
        }

        return $this;
    }

    /**
     * @param $config
     *
     * @return $this
     */
    public function custom($config)
    {
        return $this->config($config)
                    ->commit();
    }
}

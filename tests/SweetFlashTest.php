<?php

/*
 * This file is part of Laravel Sweet Flash.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\SweetFlash\Test;

/**
 * Class FlashTest.
 */
class SweetFlashTest extends \Orchestra\Testbench\TestCase
{
    protected $session;

    /**
     * Setup the test environment.
     */
    public function setUp()
    {
        parent::setUp();

        $this->session = \Mockery::mock('Illuminate\Session\Store');
    }

    /** @test */
    public function it_displays_default_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('sweet_flash.messages', 'Welcome Aboard');
        $this->session->shouldReceive('flash')->with('sweet_flash.title', 'Notice');
        $this->session->shouldReceive('flash')->with('sweet_flash.level', 'info');

        \SweetFlash::message('Welcome Aboard');
    }

    /** @test */
    public function it_displays_info_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('sweet_flash.messages', 'Welcome Aboard');
        $this->session->shouldReceive('flash')->with('sweet_flash.title', 'Notice');
        $this->session->shouldReceive('flash')->with('sweet_flash.level', 'info');

        \SweetFlash::info('Welcome Aboard');
    }

    /** @test */
    public function it_displays_success_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('sweet_flash.messages', 'Welcome Aboard');
        $this->session->shouldReceive('flash')->with('sweet_flash.title', 'Notice');
        $this->session->shouldReceive('flash')->with('sweet_flash.level', 'success');

        \SweetFlash::success('Welcome Aboard');
    }

    /** @test */
    public function it_displays_error_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('sweet_flash.messages', 'Uh Oh');
        $this->session->shouldReceive('flash')->with('sweet_flash.title', 'Notice');
        $this->session->shouldReceive('flash')->with('sweet_flash.level', 'danger');

        \SweetFlash::error('Uh Oh');
    }

    /** @test */
    public function it_displays_warning_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('sweet_flash.messages', 'Be careful!');
        $this->session->shouldReceive('flash')->with('sweet_flash.title', 'Notice');
        $this->session->shouldReceive('flash')->with('sweet_flash.level', 'warning');

        \SweetFlash::warning('Be careful!');
    }

    /** @test */
    public function it_displays_custom_message_titles()
    {
        $this->session->shouldReceive('flash')->with('sweet_flash.messages', 'You are now signed up.');
        $this->session->shouldReceive('flash')->with('sweet_flash.title', 'Success Heading');
        $this->session->shouldReceive('flash')->with('sweet_flash.level', 'success');

        \SweetFlash::success('You are now signed up.', 'Success Heading');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['DraperStudio\SweetFlash\ServiceProvider'];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return ['SweetFlash' => 'DraperStudio\SweetFlash\Facades\SweetFlash'];
    }
}

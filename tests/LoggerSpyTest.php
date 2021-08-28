<?php

namespace TestDouble\Psr3;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;

/**
 * @covers \TestDouble\Psr3\LoggerSpy
 */
final class LoggerSpyTest extends TestCase
{
    /**
     * @test
     */
    public function detects_if_any_logging_was_called()
    {
        $sut = new LoggerSpy();
        $sut->log(LogLevel::INFO, 'Interesting event');
        $this->assertTrue($sut->any());
    }

    /**
     * @test
     */
    public function detects_if_any_emergency_was_called()
    {
        $sut = new LoggerSpy();
        $sut->emergency('System is unusable.');
        $this->assertTrue($sut->anyEmergency());
    }

    /**
     * @test
     */
    public function detects_if_any_alert_was_called()
    {
        $sut = new LoggerSpy();
        $sut->alert('Action must be taken immediately.');
        $this->assertTrue($sut->anyAlert());
    }

    /**
     * @test
     */
    public function detects_if_critical_was_called()
    {
        $sut = new LoggerSpy();
        $sut->critical('Critical condition.');
        $this->assertTrue($sut->anyCritical());
    }

    /**
     * @test
     */
    public function detects_if_any_error_was_called()
    {
        $sut = new LoggerSpy();
        $sut->error('Runtime error');
        $this->assertTrue($sut->anyError());
    }

    /**
     * @test
     */
    public function detects_if_any_warning_was_called()
    {
        $sut = new LoggerSpy();
        $sut->warning('Exceptional occurrence that is not errors.');
        $this->assertTrue($sut->anyWarning());
    }

    /**
     * @test
     */
    public function detects_if_any_notice_was_called()
    {
        $sut = new LoggerSpy();
        $sut->notice('Normal but significant event.');
        $this->assertTrue($sut->anyNotice());
    }

    /**
     * @test
     */
    public function detects_if_any_info_was_called()
    {
        $sut = new LoggerSpy();
        $sut->info('Interesting event.');
        $this->assertTrue($sut->anyInfo());
    }

    /**
     * @test
     */
    public function detects_if_any_debug_was_called()
    {
        $sut = new LoggerSpy();
        $sut->debug('Detailed debug information.');
        $this->assertTrue($sut->anyDebug());
    }

    /**
     * @test
     */
    public function can_spy_on_another_logger()
    {
        $spy = new LoggerSpy();
        $sut = new LoggerSpy($spy);

        $sut->info('Some interesting message');

        $this->assertTrue($spy->anyInfo());
    }
}
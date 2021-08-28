<?php

namespace Raigu\TestDouble\Psr3;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\NullLogger;

/**
 * I am a Logger. I spy on the caller. I can tell if caller has used me.
 */
final class LoggerSpy extends AbstractLogger
{
    private LoggerInterface $logger;

    private array $logs;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logs = [];
        $this->logger = $logger ?? new NullLogger;
    }

    public function log($level, $message, array $context = array())
    {
        $this->logs[] = [$level, $message, $context];
        $this->logger->log($level, $message, $context);
    }

    private function anyOf($level): bool
    {
        foreach ($this->logs as $log) {
            if ($log[0] === $level) {
                return true;
            }
        }

        return false;
    }

    public function any(): bool
    {
        return !empty($this->logs);
    }

    public function anyEmergency(): bool
    {
        return $this->anyOf(LogLevel::EMERGENCY);
    }

    public function anyAlert(): bool
    {
        return $this->anyOf(LogLevel::ALERT);
    }

    public function anyCritical(): bool
    {
        return $this->anyOf(LogLevel::CRITICAL);
    }

    public function anyError(): bool
    {
        return $this->anyOf(LogLevel::ERROR);
    }

    public function anyWarning(): bool
    {
        return $this->anyOf(LogLevel::WARNING);
    }

    public function anyNotice(): bool
    {
        return $this->anyOf(LogLevel::NOTICE);
    }

    public function anyInfo(): bool
    {
        return $this->anyOf(LogLevel::INFO);
    }

    public function anyDebug(): bool
    {
        return $this->anyOf(LogLevel::DEBUG);
    }
}
<?php

namespace TestDouble\Psr3;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

final class LoggerSpy implements LoggerInterface
{
    public function __construct()
    {
        $this->logs = [];
    }

    private array $logs;

    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        $this->logs[] = [$level, $message, $context];
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
[![Latest Stable Version](http://poser.pugx.org/raigu/psr3-log-spy/v/stable)](https://packagist.org/packages/raigu/psr3-log-spy)
[![Fallows SemVer](https://img.shields.io/badge/SemVer-2.0.0-green)](https://semver.org/spec/v2.0.0.html)
[![build](https://github.com/raigu/psr3-log-spy/workflows/build/badge.svg)](https://github.com/raigu/psr3-log-spy/actions)
[![codecov](https://codecov.io/gh/raigu/psr3-log-spy/branch/main/graph/badge.svg?token=9DD044TN72)](https://codecov.io/gh/raigu/psr3-log-spy)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)


# psr3-log-spy

An implementation of PSR-3 LoggerInterface for spying on a subject under test (SUT) to verify that the SUT is using the
given logger.

# Compatibility

* PHP 7.4, ^8.0
* psr/log ^1.1||2.0.0

# Changes

[./CHANGELOG.md](./CHANGELOG.md)

# Install

```shell
$ composer require --dev raigu/psr3-log-spy
```

# Usage

```php
$spy = new \Raigu\TestDouble\Psr3\LoggerSpy();

$sut = new Foo($spy);
$sut->bar();

assert($spy->any());
```

# Methods

| Method       	| Description                               	|
|--------------	|-------------------------------------------	|
| any          	| at least one message was logged           	|
| anyEmergency 	| at least one emergency message was logged 	|
| anyAlert     	| at least one alert message was logged     	|
| anyCritical  	| at least one critical message was logged  	|
| anyError     	| at least one error message was logged     	|
| anyWarning   	| at least one warning message was logged   	|
| anyNotice    	| at least one notice message was logged    	|
| anyInfo      	| at least one info message was logged      	|
| anyDebug     	| at least on debug message was logged      	|


# Testing

```shell
$ composer test
$ composer specification 
$ composer coverage
```
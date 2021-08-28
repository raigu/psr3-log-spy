[![build](https://github.com/php-testdouble/psr3-spy/workflows/build/badge.svg)](https://github.com/php-testdouble/psr3-spy/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)


# psr3-spy

Spy implementing PSR-3 LoggerInterface for tests

# Compatibility

*PHP 7.4, ^8.0

# Usage

```php
$spy = new \TestDouble\Psr3\LoggerSpy();

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
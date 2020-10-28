# FarmOpsX-API PHP Package

[![Build Status](https://travis-ci.com/SmartOysters/farmopsx-api.svg?branch=main)](https://travis-ci.com/SmartOysters/farmopsx-api)

This package provides a complete **framework agnostic** FarmOpsX API client library for PHP.

Feel free to drop me a message at __james.rickard@smartoysters.com__ or tweet me at [@frodosghost](https://twitter.com/frodosghost).

# Documentation

No documentation, just yet.

# Installation

You can install the package via `composer require` command:

```shell
composer require smartoysters/farmopsx-api
```

Or simply add it to your composer.json dependences and run `composer update`:

```json
"require": {
    "smartoysters/farmopsx-api": "^1.0"
}
```

# Usage

```php
$token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';

$farmopsx = new \SmartOysters\FarmOpsX\FarmOpsX($token);
```

## Guzzle Client Options

The options value in the constructor allows configuration for the [Guzzle Client](https://github.com/guzzle/guzzle/blob/master/src/Client.php#L27) to  set any number of default request options.

```php

$options = [
    'timeout'         => 0,
    'allow_redirects' => false,
    'proxy'           => '192.168.16.1:10'
];

$farmopsx = new \SmartOysters\FarmOpsX\FarmOpsX($token, $uri, $options);
```

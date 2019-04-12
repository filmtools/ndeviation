# FilmTools · FilmSpeed

**Interfaces, classes and traits for Zone system deviation**

[![Packagist](https://img.shields.io/packagist/v/filmtools/ndeviation.svg?style=flat)](https://packagist.org/packages/filmtools/ndeviation)
[![PHP version](https://img.shields.io/packagist/php-v/filmtools/ndeviation.svg)](https://packagist.org/packages/filmtools/ndeviation)
[![Build Status](https://img.shields.io/travis/filmtools/ndeviation.svg?label=Travis%20CI)](https://travis-ci.org/filmtools/ndeviation)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/filmtools/ndeviation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/filmtools/ndeviation/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/filmtools/ndeviation/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/filmtools/ndeviation/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/filmtools/ndeviation/badges/build.png?b=master)](https://scrutinizer-ci.com/g/filmtools/ndeviation/build-status/master)

## Installation

```bash
$ composer require filmtools/ndeviation
```



## NDeviation classes

```php
<?php
use FilmTools\NDeviation\NDeviation;
use FilmTools\NDeviation\NDeviationFormatter;

// Short title is optional;
$ndev = new NDeviation( 2 );
$ndev = new NDeviation( 2, "push +2" );

// Grab values
$ndev->getValue(); // 2.0
$ndev->getType(); // "push +2"

// Nice formatting:
$formatter = new NDeviationFormatter;
echo $formatter( $ndev ); // "𝑵 +2"
// …can cope with strings
echo $formatter( "2.2" ); // "𝑵 +2.2"
echo $formatter( "foo" ); // "foo"
```



## Interfaces


### NDeviationInterface

```php
use FilmTools\NDeviation\NDeviationInterface;

public function getValue() : float;
public function getType() : ?string;
```

### NDeviationProviderInterface

```php
use FilmTools\NDeviation\NDeviationInterface;
use FilmTools\NDeviation\NDeviationProviderInterface;

public function getNDeviation() : NDeviationInterface;
```



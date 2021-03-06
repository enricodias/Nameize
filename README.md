# Nameize

[![Build Status](https://travis-ci.com/enricodias/nameize.svg?branch=master)](https://travis-ci.com/enricodias/nameize)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/ce9cfa2739534021a15aebfb7037ef1d)](https://www.codacy.com/manual/enricodias/nameize?utm_source=github.com&utm_medium=referral&utm_content=enricodias/nameize&utm_campaign=Badge_Coverage)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ce9cfa2739534021a15aebfb7037ef1d)](https://www.codacy.com/manual/enricodias/nameize?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=enricodias/nameize&amp;utm_campaign=Badge_Grade)
[![Latest version](http://img.shields.io/packagist/v/enricodias/nameize.svg)](https://packagist.org/packages/enricodias/nameize)
[![Downloads total](http://img.shields.io/packagist/dt/enricodias/nameize.svg)](https://packagist.org/packages/enricodias/nameize)
[![License](http://img.shields.io/packagist/l/enricodias/nameize.svg)](https://github.com/enricodias/nameize/blob/master/LICENSE.md)

A simple class to correctly capitalize full names.

## Installation

Require this package with Composer in the root directory of your project

```bash
composer require enricodias/nameize
```

and include the composer's autoloader in your code

```php
include 'vendor/autoload.php';
```

## Usage

### Simple usage

```php
echo \enricodias\Nameize::create()->name("Carlo D'ippoliti"); // Carlo D'Ippoliti
```

or

```php
$nameize = new \enricodias\Nameize();

echo $nameize->name("Matteo Dell'aqcua");  // Matteo Dell'Aqcua
echo $nameize->name("john o'grady-smith"); // John O'Grady-Smith
```

### Specifying special characters

The method ```setAllowedCharacters()``` receives an array of special characters. Those characters signalizes that the next letter should be in upper case. If no character is specified, the default ```array("'", '-')``` is used. If you pass a string, it will be consider a single character.



```php
$nameize = new \enricodias\Nameize();

$nameize->setAllowedCharacters("'");

echo $nameize->name("Matteo Dell'aqcua");  // Matteo Dell'Aqcua
echo $nameize->name("john o'grady-smith"); // John O'Grady-smith
```

or with method chaining:

```php
echo \enricodias\Nameize::create()
    ->setAllowedCharacters("-")
    ->name("john o'grady-smith"); // John O'grady-Smith
```

### Minimum length

Some languages require capitalization on the first letter of every word regardless of their size. The ```setMinLength()``` method sets the minimum length of which words will be capitalized (min: 1, max: 5, default: 4).

```php
$nameize = new \enricodias\Nameize();

$nameize->setMinLength(1);

echo $nameize->name("Tri vu phu");    // Tri Vu Phu
echo $nameize->name("Shuanping dai"); // Shuanping Dai
```

or with method chaining:

```php
echo \enricodias\Nameize::create()
    ->setMinLength(1)
    ->name("Tri vu phu"); // Tri Vu Phu
```

Your application may detect the user's country and use the appropriate minLength value.

## Additional features

If you need more features I recommend using a name parser such as <https://github.com/theiconic/name-parser>

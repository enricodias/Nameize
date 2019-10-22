# nameize

[![Build Status](https://travis-ci.com/enricodias/nameize.svg?branch=master)](https://travis-ci.com/enricodias/nameize)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/ce9cfa2739534021a15aebfb7037ef1d)](https://www.codacy.com/manual/enricodias/nameize?utm_source=github.com&utm_medium=referral&utm_content=enricodias/nameize&utm_campaign=Badge_Coverage)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ce9cfa2739534021a15aebfb7037ef1d)](https://www.codacy.com/manual/enricodias/nameize?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=enricodias/nameize&amp;utm_campaign=Badge_Grade)

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
echo (new \enricodias\nameize())->name("Carlo D'ippoliti"); // Carlo D'Ippoliti
```

or

```php
$nameize = new \enricodias\nameize();
echo $nameize->name("Matteo Dell'aqcua");  // Matteo Dell'Aqcua
echo $nameize->name("john o'grady-smith"); // John O'Grady-Smith
```

### Specifying special characters

The constructor has an optional argument that receives an array of special characters. Those characters sinalizes that the next letter should be in upper case. If no character is specified, the default ```array("'", '-')``` is used. If you pass a string, it will be consider a single character.

```php
use enricodias\nameize;

echo (new nameize("'"))->name("john o'grady-smith");        // John O'Grady-smith
echo (new nameize(array('-')))->name("john o'grady-smith"); // John O'grady-Smith
```

or 

```php
$nameize = new \enricodias\nameize("'");
echo $nameize->name("Matteo Dell'aqcua");  // Matteo Dell'Aqcua
echo $nameize->name("john o'grady-smith"); // John O'Grady-smith
```

## Additional features

If you need more features I recommend using a name parser such as <https://github.com/theiconic/name-parser>

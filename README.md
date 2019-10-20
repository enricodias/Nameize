# nameize

A simple class to correctly capitalize full names, specially Brazilian names.

## Installation

Require this package with Composer in the root directory of your project.

```bash
composer require enricodias/nameize
```

## Usage

### Creating an object instance

```php
$Object = new \enricodias\nameize();
$Object->nameize("joão da silva"); // returns João da Silva
```

### Using a static method

```php
\enricodias\nameize::format("mArIa dAs DORES"); // returns Maria das Dores
```

### Specifying special characters

The second parameter is optional and receives a single (or list of) special characters. Those characters sinalizes that the next letter should be in upper case. If no character is specified, the default ```array("'", '-')``` is used.

```php
\enricodias\nameize::format("john o'grady-smith");      // returns John O'Grady-Smith
\enricodias\nameize::format("john o'grady-smith", "'"); // returns John O'Grady-smith
```

## Other features

If you need more features, I recommend using a name parser such as https://github.com/theiconic/name-parser

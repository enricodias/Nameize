# nameize

Simple class to correctly capitalize full names, specially Brazilian names.


### Basic usage

```php
$Object = new \nameize\nameize();
$Object->nameize("joão da silva"); // returns João da Silva
```


### With static methods

```php
\nameize\nameize::format("mArIa dAs DORES"); // returns Maria das Dores
```


### Specifying special characters

The second parameter is optional and receives a single (or list of) special characters. Those characters sinalizes that the next letter should be in upper case. If no character is specified, the default ```array("'", '-')``` is used.

```php

\nameize\nameize::format("john o'grady-smith");      // returns John O'Grady-Smith
\nameize\nameize::format("john o'grady-smith", "'"); // returns John O'Grady-smith

```

# nameize

Correctly capitalize full names, specially Brazilian names.


### Basic usage

```php

$Object = new \nameize\nameize();
$Object->nameize("john o'grady-smith");      // returns John O'Grady-Smith

```


### With static methods

```php

\nameize\nameize::format("joão da silva");   // returns João da Silva
\nameize\nameize::format("mArIa dAs DORES"); // returns Maria das Dores

```

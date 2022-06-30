# SQL Parser Util

Utility class to parse sql statements containing named parameters into one using positional parameters.

## Example

```php

[$sql, $params, $types] = SQLParserUtils::expandListParameters($sql, $params, $types);

```

## Credits

[The code was extracted from doctrine 2.13.7](https://github.com/doctrine/dbal/blob/dc9b3c3c8592c935a6e590441f9abc0f9eba335b/lib/Doctrine/DBAL/SQLParserUtils.php). 
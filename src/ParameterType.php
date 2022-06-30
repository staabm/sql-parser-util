<?php

namespace staabm\SqlParserUtils;

use Closure;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Cache\ArrayStatement;
use Doctrine\DBAL\Cache\CacheException;
use Doctrine\DBAL\Cache\QueryCacheProfile;
use Doctrine\DBAL\Cache\ResultCacheStatement;
use Doctrine\DBAL\Driver\Connection as DriverConnection;
use Doctrine\DBAL\Driver\PDO\Statement as PDODriverStatement;
use Doctrine\DBAL\Driver\PingableConnection;
use Doctrine\DBAL\Driver\ResultStatement;
use Doctrine\DBAL\Driver\ServerInfoAwareConnection;
use Doctrine\DBAL\Exception\ConnectionLost;
use Doctrine\DBAL\Exception\InvalidArgumentException;
use Doctrine\DBAL\Exception\NoKeyValue;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Query\Expression\ExpressionBuilder;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\Deprecations\Deprecation;
use PDO;
use Throwable;
use Traversable;

use function array_key_exists;
use function array_shift;
use function assert;
use function func_get_args;
use function implode;
use function is_int;
use function is_string;
use function key;

final class ParameterType
{
    /**
     * Represents the SQL NULL data type.
     *
     * @see \PDO::PARAM_NULL
     */
    public const NULL = PDO::PARAM_NULL;

    /**
     * Represents the SQL INTEGER data type.
     *
     * @see \PDO::PARAM_INT
     */
    public const INTEGER = PDO::PARAM_INT;

    /**
     * Represents the SQL CHAR, VARCHAR, or other string data type.
     *
     * @see \PDO::PARAM_STR
     */
    public const STRING = PDO::PARAM_STR;

    /**
     * Represents a boolean data type.
     *
     * @see \PDO::PARAM_BOOL
     */
    public const BOOLEAN = PDO::PARAM_BOOL;
}

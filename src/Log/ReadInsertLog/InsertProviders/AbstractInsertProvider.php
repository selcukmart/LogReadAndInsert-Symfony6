<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 13:45
 */

namespace App\Log\ReadInsertLog\InsertProviders;

use App\Log\ReadInsertLog\ReadInsertLogDirector;

abstract class AbstractInsertProvider
{
    private static array $insertProvider;

    public function __construct(protected ReadInsertLogDirector $readInsertLogDirector)
    {
    }

    public static function getInstance(ReadInsertLogDirector $readInsertLogDirector): InsertProviderInterface
    {
        if (!empty(self::$insertProvider[$readInsertLogDirector->getLogPath()])) {
            return self::$insertProvider[$readInsertLogDirector->getLogPath()];
        }
        self::$insertProvider[$readInsertLogDirector->getLogPath()] = new static($readInsertLogDirector);
        return self::$insertProvider[$readInsertLogDirector->getLogPath()];
    }

    public function __destruct()
    {
    }
}
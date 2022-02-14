<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 14:33
 */

namespace App\Log\ReadInsertLog\ReadLog;

use Kassner\LogParser\FormatException;
use Kassner\LogParser\LogParser;

class LogLineParser
{
    private static LogParser $logParser;

    public function __construct(private readonly string $log_line)
    {
    }

    /**
     * @throws FormatException
     */
    public function parseLine(): array
    {
        return (array)self::getParser()->parse($this->log_line);
    }

    public static function getParser()
    {
        if (self::$logParser) {
            return self::$logParser;
        }
        self::$logParser = new LogParser();
        self::$logParser->setFormat('%P %l %u %t "%r" %>s %O "%{Referer}i" \"%{User-Agent}i"');
        return self::$logParser;
    }

    public static function getInstance(string $log_line): LogLineParser
    {
        return new self($log_line);
    }

    public function __destruct()
    {

    }
}
<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 13:44
 */

namespace App\Log\ReadInsertLog;

use App\GlobalTraits\ErrorMessagesWithResultTrait;
use App\Log\ReadInsertLog\ReadLog\InsertStringLogLine;
use App\Log\ReadInsertLog\ReadLog\ReadAndInsertLog;
use Kassner\LogParser\FormatException;

class ReadInsertLogDirector
{

    use ErrorMessagesWithResultTrait;

    private string $namespace;
    private string $provider_class;

    public function __construct(private readonly string $log_path, private readonly string $provider)
    {
        $this->namespace = __NAMESPACE__;
    }

    /**
     * @throws FormatException
     */
    public function execute(): void
    {
        ReadAndInsertLog::getInstance($this,new InsertStringLogLine())->readAndInsert();
    }

    /**
     * @return string
     */
    public function getProviderClass(): string
    {
        if (!empty($this->provider_class)) {
            return $this->provider_class;
        }
        $this->provider_class = $this->getNamespace() . '\InsertProviders\\' . strtoupper($this->provider);
        return $this->provider_class;
    }

    /**
     * @return string
     */
    public function getLogPath(): string
    {
        return $this->log_path;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }


    public function __destruct()
    {

    }
}
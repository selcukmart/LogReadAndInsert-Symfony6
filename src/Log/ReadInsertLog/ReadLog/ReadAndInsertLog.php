<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 13:49
 */

namespace App\Log\ReadInsertLog\ReadLog;

use App\Log\ReadInsertLog\InsertProviders\InsertProviderInterface;
use App\Log\ReadInsertLog\ReadInsertLogDirector;
use Kassner\LogParser\FormatException;
use SplFileObject;

class ReadAndInsertLog
{

    private static array $spl_instance = [];
    private InsertProviderInterface $insertProvider;

    public function __construct(private ReadInsertLogDirector $readInsertLogDirector, private InsertStringLogLine $insertStringLogLine)
    {
        $provider_class = $this->readInsertLogDirector->getProviderClass();
        $this->insertProvider = $provider_class::getInstance($this->readInsertLogDirector);
    }

    /**
     * @throws FormatException
     */
    public function readAndInsert(): void
    {
        $spl_file_object = self::getSplFileObjectInstance($this->readInsertLogDirector->getLogPath());
        $this->readAndInsertLineByLine($spl_file_object);
    }

    /**
     * @throws FormatException
     */
    private function insertToProvider($current_line, $lineNumber): void
    {
        $this->insertStringLogLine->insertToProvider($this->insertProvider, $current_line, $lineNumber);
    }

    /**
     * @description Singleton
     * @param $file
     * @return SplFileObject
     * @author selcukmart
     * 12.02.2022
     * 15:29
     */
    private static function getSplFileObjectInstance($file): SplFileObject
    {
        if (!isset(self::$spl_instance[$file])) {
            self::$spl_instance[$file] = new SplFileObject($file);
        }
        return self::$spl_instance[$file];
    }

    private function getResumeLineNumber(): int
    {
        return 43;
    }


    /**
     * @param SplFileObject $spl_file_object
     * @throws FormatException
     * @author selcukmart
     * 12.02.2022
     * 15:16
     */
    private function readAndInsertLineByLine(SplFileObject $spl_file_object): void
    {
        $lineNumber = $this->getResumeLineNumber();
        $spl_file_object->seek($lineNumber);
        $current_line = $spl_file_object->current();
        $this->insertToProvider($current_line, $lineNumber);
        while (!$spl_file_object->eof()) {
            $lineNumber = $spl_file_object->key();
            $this->insertToProvider($spl_file_object->current(), $lineNumber);
            $spl_file_object->next();
        }
    }

    public static function getInstance(ReadInsertLogDirector $readInsertLogDirector, InsertStringLogLine $insertStringLogLine): ReadAndInsertLog
    {
        return new self($readInsertLogDirector, $insertStringLogLine);
    }

    public function __destruct()
    {

    }
}
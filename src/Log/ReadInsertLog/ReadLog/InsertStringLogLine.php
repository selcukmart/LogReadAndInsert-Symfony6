<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 15:25
 */

namespace App\Log\ReadInsertLog\ReadLog;

use App\Log\ReadInsertLog\InsertProviders\InsertProviderInterface;
use Kassner\LogParser\FormatException;

class InsertStringLogLine
{


    /**
     * @throws FormatException
     */
    public function insertToProvider(InsertProviderInterface $insertProvider, $current_line, $lineNumber): void
    {
        $log_parsed_as_array = LogLineParser::getInstance($current_line)->parseLine();
        $log_array_as_formatted = FormatParsedLogAsLastArray::getInstance($log_parsed_as_array)->arrange($lineNumber);
        $insertProvider->insert($log_array_as_formatted);
    }
}
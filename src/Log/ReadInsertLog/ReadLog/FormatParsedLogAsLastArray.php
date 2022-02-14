<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 14:47
 */

namespace App\Log\ReadInsertLog\ReadLog;

class FormatParsedLogAsLastArray
{
    public function __construct(private readonly array $log_line_array)
    {
    }

    public function arrange($lineNumber): array
    {
        $log_line_array = $this->log_line_array;
        $log_line_array['service_name'] = $this->log_line_array['host'];
        $log_line_array['start_date'] = $this->log_line_array['stamp'];
        $log_line_array['status_code'] = $this->log_line_array['status'];
        $explode = explode(" ", $this->log_line_array['request']);
        $log_line_array['http_method'] = $explode[0];
        $log_line_array['path'] = $explode[1];
        $log_line_array['http_protocol'] = $explode[2];
        $log_line_array['line_number'] = $lineNumber;
        return $log_line_array;
    }

    public static function getInstance(array $log_line_array): FormatParsedLogAsLastArray
    {
        return new self($log_line_array);
    }

    public function __destruct()
    {

    }
}
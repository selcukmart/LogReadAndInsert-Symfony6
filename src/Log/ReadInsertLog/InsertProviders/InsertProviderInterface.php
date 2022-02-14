<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 13:45
 */

namespace App\Log\ReadInsertLog\InsertProviders;

interface InsertProviderInterface
{
    public function insert(array $parsed_log_array);
}
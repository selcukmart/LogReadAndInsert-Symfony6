<?php
/**
 * @author selcukmart
 * 12.02.2022
 * 13:47
 */

namespace App\Log\ReadInsertLog\InsertProviders;

class JSON extends AbstractInsertProvider implements InsertProviderInterface, SaveToFileInterface
{

    /**
     * @description this is only an example to see that the providers can be expanded like this.
     * @param array $parsed_log_array
     * @author selcukmart
     * 12.02.2022
     * 14:56
     */
    public function insert(array $parsed_log_array)
    {
    }

    /**
     * @description this is only an example to see that SaveToFileInterface is interface segregation.
     * @author selcukmart
     * 12.02.2022
     * 14:58
     */
    public function saveToFile()
    {

    }
}
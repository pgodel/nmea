<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;
use NMEA\Sentence;

class Factory
{
    /**
     * @param $rawSentence
     * @param bool $skipChecksum
     * @return AbstractSentence
     */
    public function create($rawSentence, $skipChecksum = false)
    {
        $parts = explode(',', $rawSentence);
        if (count($parts) < 5) {
            throw new \InvalidArgumentException(sprintf("The sentence '%s' is not valid.", $rawSentence));
        }

        if ('$' !== substr($parts[0], 0, 1)) {
            throw new \InvalidArgumentException(sprintf("The sentence '%s' data type must start with a \$ sign.", $rawSentence));
        }

        if ('GP' === substr($parts[0], 1, 2)) {
            $key = substr($parts[0], 3);
        } else {
            // proprietary codes
            $key = substr($parts[0], 1);
        }
        if (!isset(DataType::$types[$key])) {
            throw new \InvalidArgumentException(sprintf("The data type '%s' in sentence '%s' is invalid or not supported.", $parts[0], $rawSentence));
        }

        $class = 'NMEA\\Sentence\\'.$key;
        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf("Class not found for data type '%s' in sentence '%s'.", $parts[0], $rawSentence));
        }

        $sentence = new $class();
        /* @var $sentence AbstractSentence */
        $sentence->setRawSentence($rawSentence);
        if (!$skipChecksum && $sentence->hasChecksum() && !$sentence->validateChecksum()) {
            throw new \InvalidArgumentException(sprintf("Checksum failed for sentence '%s'.", $rawSentence));
        }

        return $sentence;
    }

}
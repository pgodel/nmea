<?php

namespace NMEA\Sentence;

use NMEA\DataType;
use NMEA\Sentence;

class Factory
{
    public function create($rawSentence)
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

        $sentence = new Sentence($key);
        $sentence->setRawSentence($rawSentence);

        return $sentence;
    }
}
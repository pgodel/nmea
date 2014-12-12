<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;

class GLL extends AbstractSentence
{
    function __construct()
    {
        parent::__construct(DataType::GLL);
    }

    /**
     * @param string $rawSentence
     */
    public function setRawSentence($rawSentence)
    {
        parent::setRawSentence($rawSentence);
        $parts = explode(',', $rawSentence);
        $checksum = null;
        if (isset($parts[7])) {
            list($val, $checksum) = $this->splitChecksum($parts[7]);
        }
        $this->setValues(array(
            'latitud' => $parts[1].','.$parts[2],
            'longitud' => $parts[3].','.$parts[4],
            'fix' => $parts[5],
            'dataActive' => $parts[6],
        ));
        if (null !== $checksum) {
            $this->setValue('checksum', $checksum);
        }
    }
}
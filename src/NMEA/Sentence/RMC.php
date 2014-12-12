<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;

class RMC extends AbstractSentence
{
    function __construct()
    {
        parent::__construct(DataType::RMC);
    }

    /**
     * @param string $rawSentence
     */
    public function setRawSentence($rawSentence)
    {
        parent::setRawSentence($rawSentence);
        $parts = explode(',', $rawSentence);

        list($val, $checksum) = $this->splitChecksum($parts[11]);

        $this->setValues(array(
            'fix' => $parts[1],
            'status' => $parts[2],
            'latitud' => $parts[3].','.$parts[4],
            'longitud' => $parts[5].','.$parts[6],
            'speed' => $parts[7],
            'trackAngle' => $parts[8],
            'date' => $parts[9],
            'magneticVariation' => $parts[10].','.$val,
            'checksum' => $checksum,
        ));
    }
}
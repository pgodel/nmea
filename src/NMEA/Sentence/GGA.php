<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;

class GGA extends AbstractSentence
{
    function __construct()
    {
        parent::__construct(DataType::GGA);
    }

    /**
     * @param string $rawSentence
     */
    public function setRawSentence($rawSentence)
    {
        parent::setRawSentence($rawSentence);
        $parts = explode(',', $rawSentence);

        list($val, $checksum) = $this->splitChecksum($parts[14]);

        $this->setValues(array(
            'fix' => $parts[1],
            'latitud' => $parts[2].','.$parts[3],
            'longitud' => $parts[4].','.$parts[5],
            'fixQuality' => $parts[6],
            'numSatellites' => $parts[7],
            'horizontalDilution' => $parts[8],
            'altitud' => $parts[9],
            'altitudUnit' => $parts[10],
            'geoidalSeparation' => $parts[11],
            'geoidalSeparationUnit' => $parts[12],
            'timeSinceLastUpdate' => $parts[13],
            'dgpsStationId' => $val,
            'checksum' => $checksum,
        ));
    }
}
<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;

class GSV extends AbstractSentence
{
    function __construct()
    {
        parent::__construct(DataType::GSV);
    }

    /**
     * @param string $rawSentence
     */
    public function setRawSentence($rawSentence)
    {
        parent::setRawSentence($rawSentence);
        $parts = explode(',', $rawSentence);

        list($val, $checksum) = $this->splitChecksum($parts[17]);

        $this->setValues(array(
            'numberOfSentences' => $parts[1],
            'sentence' => $parts[2],
            'numberOfSatellites' => $parts[3],
            'prn1' => $parts[4],
            'elevation' => $parts[5],
            'azimuth' => $parts[6],
            'snr' => $parts[7],
            'checksum' => $checksum,
        ));
    }
}
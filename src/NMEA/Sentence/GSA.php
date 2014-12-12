<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;

class GSA extends AbstractSentence
{
    function __construct()
    {
        parent::__construct(DataType::GSA);
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
            'autoSelection' => $parts[1],
            '3dFix' => $parts[2],
            'prn1' => $parts[3],
            'prn2' => $parts[4],
            'prn3' => $parts[5],
            'prn4' => $parts[6],
            'prn5' => $parts[7],
            'prn6' => $parts[8],
            'prn7' => $parts[9],
            'prn8' => $parts[10],
            'prn9' => $parts[11],
            'prn10' => $parts[12],
            'prn11' => $parts[13],
            'prn12' => $parts[14],
            'pdop' => $parts[15],
            'hdop' => $parts[16],
            'vdop' => $val,
            'checksum' => $checksum,
        ));
    }
}
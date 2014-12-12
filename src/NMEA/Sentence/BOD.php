<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;

class BOD extends AbstractSentence
{
    function __construct()
    {
        parent::__construct(DataType::BOD);
    }

    /**
     * @param string $rawSentence
     */
    public function setRawSentence($rawSentence)
    {
        parent::setRawSentence($rawSentence);
        $parts = explode(',', $rawSentence);

        $this->setValues(array(
            'bearingTrue' => $parts[1].','.$parts[2],
            'bearingMagnetic' => $parts[3].','.$parts[4],
            'destinationWaypointId' => $parts[5],
            'originWaypointId' => $parts[6],
        ));
    }
}
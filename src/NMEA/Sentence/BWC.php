<?php

namespace NMEA\Sentence;

use NMEA\AbstractSentence;
use NMEA\DataType;

class BWC extends AbstractSentence
{
    function __construct()
    {
        parent::__construct(DataType::BWC);
    }

    /**
     * @param string $rawSentence
     */
    public function setRawSentence($rawSentence)
    {
        parent::setRawSentence($rawSentence);
        $parts = explode(',', $rawSentence);

        list($val, $checksum) = $this->splitChecksum($parts[12]);

        $this->setValues(array(
            'fix' => $parts[1],
            'latitudOfNextWaypoint' => $parts[2].','.$parts[3],
            'longitudOfNextWaypoint' => $parts[4].','.$parts[5],
            'trueTrackToWaypoint' => $parts[6],
            'trueTrack' => $parts[7],
            'magneticTrackToWaypoint' => $parts[8],
            'magnecticTrack' => $parts[9],
            'rangeToWaypoint' => $parts[10],
            'rangeToWaypointUnit' => $parts[11],
            'waypointId' => $val,
            'checksum' => $checksum,
        ));
    }
}
<?php

namespace NMEA\Tests;

use NMEA\DataType;
use NMEA\Sentence;

class SentenceTest extends \PHPUnit_Framework_TestCase
{
    public function testSentence()
    {
        $str = '$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::GGA, $sentence->getDataType());
    }

    public function testValidateChecksum()
    {
        $str = '$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertTrue($sentence->validateChecksum());
    }

    public function testCalculateChecksum()
    {
        $str = '$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals('47', $sentence->calculateChecksum(substr($str, 1, -3)));
    }
}
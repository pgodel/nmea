<?php

namespace NMEA\Tests;

use NMEA\DataType;
use NMEA\Sentence;

class SentenceTest extends \PHPUnit_Framework_TestCase
{
    public function testSentence()
    {
        $sentence = new Sentence(DataType::GGA);
        $this->assertEquals(DataType::GGA, $sentence->getDataType());
    }
}
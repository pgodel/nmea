<?php

namespace NMEA\Tests;

use NMEA\DataType;

class DataTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testDataType()
    {
        $this->assertArrayHasKey(DataType::GGA, DataType::$types);
    }

}
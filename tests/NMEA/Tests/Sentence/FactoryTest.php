<?php

namespace NMEA\Tests\Sentence;

use NMEA\DataType;
use NMEA\Sentence;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $str = '$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::GGA, $sentence->getDataType());
    }

    public function testGGA()
    {
        $str = '$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::GGA, $sentence->getDataType());
    }

    public function testGSA()
    {
        $str = '$GPGSA,A,3,04,05,,09,12,,,24,,,,,2.5,1.3,2.1*39';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::GSA, $sentence->getDataType());
    }

    public function testGSV()
    {
        $str = '$GPGSV,2,1,08,01,40,083,46,02,17,308,41,12,07,344,39,14,22,228,45*75';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::GSV, $sentence->getDataType());
    }

    public function testRMC()
    {
        $str = '$GPRMC,123519,A,4807.038,N,01131.000,E,022.4,084.4,230394,003.1,W*6A';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::RMC, $sentence->getDataType());
    }

    public function testGLL()
    {
        $str = '$GPGLL,4916.45,N,12311.12,W,225444,A,*1D';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::GLL, $sentence->getDataType());
    }

    public function testVTG()
    {
        $str = '$GPVTG,054.7,T,034.4,M,005.5,N,010.2,K*48';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::VTG, $sentence->getDataType());
    }

    public function testWPL()
    {
        $str = '$GPWPL,4807.038,N,01131.000,E,WPTNME*5C';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::WPL, $sentence->getDataType());
    }

    public function testAAM()
    {
        $str = '$GPAAM,A,A,0.10,N,WPTNME*32';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::AAM, $sentence->getDataType());
    }

    public function testAPB()
    {
        $str = '$GPAPB,A,A,0.10,R,N,V,V,011,M,DEST,011,M,011,M*3C';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::APB, $sentence->getDataType());
    }

    public function testBOD()
    {
        $str = '$GPBOD,045.,T,023.,M,DEST,START*01';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::BOD, $sentence->getDataType());
    }

    public function testBWC()
    {
        $str = '$GPBWC,225444,4917.24,N,12309.57,W,051.9,T,031.6,M,001.3,N,004*29';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::BWC, $sentence->getDataType());
    }

    public function testRMB()
    {
        $str = '$GPRMB,A,0.66,L,003,004,4917.24,N,12309.57,W,001.3,052.5,000.5,V*20';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::RMB, $sentence->getDataType());
    }

    public function testRTE()
    {
        $str = '$GPRTE,2,1,c,0,W3IWI,DRIVWY,32CEDR,32-29,32BKLD,32-I95,32-US1,BW-32,BW-198*69';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::RTE, $sentence->getDataType());
    }

    public function testXTE()
    {
        $str = '$GPXTE,A,A,0.67,L,N*6F';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::XTE, $sentence->getDataType());
    }

    public function testALM()
    {
        $str = '$GPALM,A.B,C.D,E,F,hh,hhhh,...';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::ALM, $sentence->getDataType());
    }

    public function testHCHDG()
    {
        $str = '$HCHDG,101.1,,,7.1,W*3C';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::HCHDG, $sentence->getDataType());
    }

    public function testZDA()
    {
        $str = '$GPZDA,201530.00,04,07,2002,00,00*60';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::ZDA, $sentence->getDataType());
    }

    public function testMSK()
    {
        $str = '$GPMSK,318.0,A,100,M,2*45';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::MSK, $sentence->getDataType());
    }

    public function testMSS()
    {
        $str = '$GPMSS,55,27,318.0,100,*66';
        $factory = new Sentence\Factory();
        $sentence = $factory->create($str);
        $this->assertEquals(DataType::MSS, $sentence->getDataType());
    }

}
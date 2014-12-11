<?php

$loader = require __DIR__.'/../vendor/autoload.php';

use NMEA\Sentence;
use NMEA\DataType;

$sentence = new Sentence(DataType::GGA);

var_dump($sentence->getDataType());
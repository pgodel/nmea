<?php

$loader = require __DIR__.'/../vendor/autoload.php';

use NMEA\Sentence;

$raw = '$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47';
//$raw = '$GPBOD,045.,T,023.,M,DEST,START';
//$raw = '$GPBWC,220516,5130.02,N,00046.34,W,213.8,T,218.0,M,0004.6,N,EGLM*21';
//$raw = '$GPBWC,081837,,,,,,T,,M,,N,*13';

$factory = new Sentence\Factory();
$sentence = $factory->create($raw);

var_dump($sentence);

nmea
====

Library to parse [NMEA](http://en.wikipedia.org/wiki/NMEA_0183) sentences. Working in progress (WIP).


## Installation

Installation is done with [Composer](http://packagist.org/about-composer).

    composer require pgodel/nmea
    
## Usage

```php
$sentence = new NMEA\Sentence(NMEA\DataType::GGA);

// or with Factory

$str = '$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47';
$sentence = NMEA\Sentence::factory($str);
```

## Data Types

### Supported Data Types

* GGA
* RMC
* More to come
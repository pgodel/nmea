<?php

namespace NMEA;

class DataType
{
    const AAM = 'AAM';
    const ALM = 'ALM';
    const APA = 'APA';
    const APB = 'APB';
    const BOD = 'BOD';
    const BWC = 'BWC';
    const DTM = 'DTM';
    const GGA = 'GGA';
    const GLL = 'GLL';
    const GRS = 'GRS';
    const GSA = 'GSA';
    const GST = 'GST';
    const GSV = 'GSV';
    const MSK = 'MSK';
    const MSS = 'MSS';
    const RMA = 'RMA';
    const RMB = 'RMB';
    const RMC = 'RMC';
    const RTE = 'RTE';
    const TRF = 'TRF';
    const STN = 'STN';
    const VBW = 'VBW';
    const VTG = 'VTG';
    const WCV = 'WCV';
    const WPL = 'WPL';
    const XTC = 'XTC';
    const XTE = 'XTE';
    const ZTG = 'ZTG';
    const ZDA = 'ZDA';
    const HCHDG = 'HCHDG';
    const PSLIB = 'PSLIB';

    public static $types = array(
        self::AAM => 'Waypoint Arrival Alarm',
        self::ALM => 'Almanac data',
        self::APA => 'Auto Pilot A sentence',
        self::APB => 'Auto Pilot B sentence',
        self::BOD => 'Bearing Origin to Destination',
        self::BWC => 'Bearing using Great Circle route',
        self::DTM => 'Datum being used',
        self::GGA => 'Fix information',
        self::GLL => 'Lat/Lon data',
        self::GRS => 'GPS Range Residuals',
        self::GSA => 'Overall Satellite data',
        self::GST => 'GPS Pseudorange Noise Statistics',
        self::GSV => 'Detailed Satellite data',
        self::MSK => 'Send control for a beacon receiver',
        self::MSS => 'Beacon receiver status information',
        self::RMA => 'Recommended Loran data',
        self::RMB => 'Recommended navigation data for gps',
        self::RMC => 'Recommended minimum data for gps',
        self::RTE => 'Route message',
        self::TRF => 'Transit Fix Data',
        self::STN => 'Multiple Data ID',
        self::VBW => 'Dual Ground / Water Spped',
        self::VTG => 'Vector track an Speed over the Ground',
        self::WCV => 'Waypoint closure velocity (Velocity Made Good)',
        self::WPL => 'Waypoint Location information',
        self::XTC => 'Cross track error',
        self::XTE => 'Measured cross track error',
        self::ZDA => 'Data and Time',
        self::ZTG => 'Zulu (UTC) time and time to go (to destination)',
        self::HCHDG => 'Compass output',
        self::PSLIB => 'Remote Control for a DGPS receiver',
    );
}
<?php


namespace App\Components\ExternalServices\GeoIP;


interface GeoIPClientInterface
{
    public function getLocationInfoByIp(string $ip);
}

<?php


namespace App\Components\ExternalServices\GeoIP\Containers;


class GeoIpData implements GeoIPDataInterface
{
    private string $lon;

    private string $lat;

    private string $town;

    public function __construct(string $lon, string $lat, string $town)
    {
        $this->lon = $lon;
        $this->lat = $lat;
        $this->town = $town;
    }

    public function getLon(): string
    {
        return $this->lon;
    }

    public function getLat(): string
    {
        return $this->lat;
    }

    public function getTown(): string
    {
        return $this->town;
    }
}

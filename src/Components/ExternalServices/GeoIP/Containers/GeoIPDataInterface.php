<?php


namespace App\Components\ExternalServices\GeoIP\Containers;


interface GeoIPDataInterface
{
    public function getLon(): string;

    public function getLat(): string;

    public function getTown(): string;
}

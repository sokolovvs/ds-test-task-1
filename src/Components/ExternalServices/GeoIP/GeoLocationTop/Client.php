<?php


namespace App\Components\ExternalServices\GeoIP\GeoLocationTop;


use App\Components\ExternalServices\GeoIP\Containers\GeoIpData;
use App\Components\ExternalServices\GeoIP\Containers\GeoIPDataInterface;
use App\Components\ExternalServices\GeoIP\Exceptions\ApiError;
use App\Components\ExternalServices\GeoIP\GeoIPClientInterface;
use Throwable;

class Client implements GeoIPClientInterface
{
    private string $sid;

    public function __construct(string $sid = null)
    {
        $this->sid = $sid ?? getenv('GEO_IP_SID');
    }

    public function getLocationInfoByIp(string $ip): GeoIPDataInterface
    {
        try {
            $url = sprintf('http://geoip.elib.ru/cgi-bin/getdata.pl?sid=%s&ip=%s&fmt=json', $this->sid, $ip);
            $data = file_get_contents($url);

            $data = json_decode($data, true);
            $data = array_pop($data);

            if ($code = $data['Error'] ?? null) {
                throw new ApiError('GeoIP API error', $code, null);
            }

            return new GeoIpData($data['Lon'], $data['Lat'], $data['Town']);
        } catch (Throwable $throwable) {
            if (!$throwable instanceof ApiError) {
                throw new ApiError('GeoIP API error', 0, $throwable);
            }

            throw  $throwable;
        }
    }
}

<?php

namespace App\Services;

use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class GeolocalisationManager
{
    public function getLocalisation(float $lat, float $lng, string $provider, string $providerKey)
    {
        
        if ($provider=='GOOGLEMAP') {
            $url="https://maps.googleapis.com/maps/api/elevation/json?locations=".$lat.",".$lng."&key=".$providerKey;
            $url='https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&key='.$providerKey;
            $json = @file_get_contents($url);
            $data = json_decode($json);
            $status = $data->status;
            if ($status == "OK") {
                return $data->results[0]->formatted_address;
           } else {
                return false;
            }
        }
    }
}

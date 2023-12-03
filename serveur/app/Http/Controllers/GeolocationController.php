<?php
namespace App\Http\Controllers;

use App\Http\Services\GeolocalisationServices;
use Illuminate\Http\Request;

class GeolocationController extends Controller
{
    protected $geoService;

    public function __construct(GeolocalisationServices $geoService)
    {
        $this->geoService = $geoService;
    }

    public function getCoordinates(Request $request)
    {
        $adresse = $request->input('adresse');

        $coordinates = $this->geoService->getCoordinates($adresse);

        if ($coordinates) {
            return response()->json([
                'latitude' => $coordinates['lat'],
                'longitude' => $coordinates['lng']
            ]);
        } else {
            return response()->json(['error' => 'Impossible de géolocaliser l\'adresse'], 400);
        }
    }

  
}

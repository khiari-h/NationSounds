<?php

namespace App\Http\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GeolocalisationServices {
    private $apiKey;
    private $client;

    public function __construct() {
        $this->apiKey = env('GOOGLE_MAPS_API_KEY');
        $this->client = new Client(); // Initialiser le client Guzzle
    }

    public function getCoordinates($address) {
        // Encoder l'adresse pour l'utilisation dans une URL
        $address = urlencode($address);

        // Construire l'URL de l'API Google Maps Geocoding
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$this->apiKey}";

        try {
            // Faire la requête à l'API Google Maps
            $response = $this->client->get($url);

            // Vérifier si la requête a réussi
            if ($response->getStatusCode() === 200) {
                $body = $response->getBody();
                $result = json_decode($body, true);

                // Extraire les coordonnées de la réponse
                if (!empty($result['results'])) {
                    $location = $result['results'][0]['geometry']['location'];
                    return $location; // Retourner les coordonnées (lat, lng)
                }
            }

            return null; // Retourner null si pas de résultat
        } catch (GuzzleException $e) {
            // Gérer l'exception comme vous le souhaitez
            return null;
        }
    }


}

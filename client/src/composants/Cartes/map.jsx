import React, { useState, useEffect, useRef } from 'react';
import { Wrapper, Status } from "@googlemaps/react-wrapper";

const Map = () => {
  const ref = useRef(null);
  const [map, setMap] = useState(null);
  const zoom = 8; // Niveau de zoom initial
  const defaultLocation = { lat: 48.8566, lng: 2.3522 }; // Paris, position par défaut

  useEffect(() => {
    // Initialisation de la carte
    const initMap = (location) => {
      if (ref.current && !map) {
        const newMap = new window.google.maps.Map(ref.current, {
          center: location,
          zoom,
        });
        setMap(newMap);
        loadMarkers(newMap); // Chargez les marqueurs dynamiquement
      }
    };

    // Chargez les marqueurs depuis le back-end
    const loadMarkers = (map) => {
      // Ici, vous devriez récupérer les données des points d'intérêt depuis votre back-end
      // et les ajouter comme marqueurs sur la carte. Cet exemple utilise des données fictives.
      const pointsOfInterest = [
        { lat: 48.8566, lng: 2.3522, title: 'Point d\'intérêt 1' }, // Exemple
        // ... autres points d'intérêt
      ];

      pointsOfInterest.forEach((poi) => {
        new window.google.maps.Marker({
          position: poi,
          map,
          title: poi.title
        });
      });
    };

    // Obtenez la position actuelle de l'utilisateur
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const currentLocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        initMap(currentLocation);
      },
      (error) => {
        console.error('Error getting location:', error);
        initMap(defaultLocation);
      }
    );
  }, [ref, map]);

  const render = (status) => {
    if (status === Status.LOADING) return <p>Loading...</p>;
    if (status === Status.FAILURE) return <p>Error loading map</p>;
    return null;
  };

  return (
    <Wrapper apiKey={process.env.REACT_APP_GOOGLE_MAPS_API_KEY} render={render}>
      <div ref={ref} id="map" style={{ height: '400px', width: '100%' }} />
    </Wrapper>
  );
};

export default Map;

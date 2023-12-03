import React from 'react';
import '../../App.css'; 

const WelcomeSection = () => {
    return (
        <div className="welcome-section">
            <h1>Bienvenue au Festival</h1>
            <p>Découvrez nos événements passionnants</p>
            <button className="btn-primary">Acheter des Billets</button>
        </div>
    );
};

export default WelcomeSection;

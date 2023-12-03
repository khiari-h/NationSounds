import React from 'react';
import '../../../App.css';

const NewsSection = () => {
    return (
        <div className="news-section">
            <h2>Actualités</h2>
            <div className="news-items">
                <div className="news-item">
                    <h3>Titre de l'Actualité</h3>
                    <p>Description brève de l'actualité...</p>
                </div>
            </div>
        </div>
    );
};

export default NewsSection;
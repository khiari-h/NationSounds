import React from 'react';
import '../../App.css'; 

const EventListSection = () => {

    const events = [
        { id: 1, name: "Concert de Rock", date: "10 Juillet", description: "Un concert de rock épique." },
        { id: 2, name: "Festival de Jazz", date: "15 Août", description: "Les meilleurs du jazz se réunissent." },
        
    ];

    return (
        <div className="event-list-section">
            <h2>Événements à Venir</h2>
            <div className="events">
                {events.map(event => (
                    <div key={event.id} className="event">
                        <h3>{event.name}</h3>
                        <p>Date: {event.date}</p>
                        <p>{event.description}</p>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default EventListSection;
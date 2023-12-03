import React from 'react';
import AboutSection from './AboutSection/Aboutsection';
import EventListSection from './EventList/EventListSection';
import ContactSection from './ContactSection/Contactsection';
import PartnerSection from './PartnerSection/Partnersection';
import LocationSection from './Localisation/Localisation';
import NewsSection from './NewsSection/NewsSection';
import WelcomeSection from './WelcomeSection/WelcomeSection';


const HomePage = () => {
    return (
        <div>
            <WelcomeSection />
            <AboutSection />
            <EventListSection />
            <ContactSection />
            <PartnerSection />
            <LocationSection />
            <NewsSection />
        </div>
    );
};

export default HomePage;
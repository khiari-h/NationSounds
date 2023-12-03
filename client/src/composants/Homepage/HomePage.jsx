import React from 'react';
import AboutSection from './AboutSection/AboutSection';
import EventListSection from './EventListSection/EventListSection';
import ContactSection from './ContactSection/ContactSection';
import PartnerSection from './PartnerSection/PartnerSection';
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
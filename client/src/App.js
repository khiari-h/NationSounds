import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import EventList from './composants/Formulaires/EventList';
import EventForm from './composants/Formulaires/EventForm';
import Header from './composants/Header/header';
import Footer from './composants/Footer/footer';

const App = () => {
  return (
    <Router>
      <Header />
      <ul>
        <li><Link to="/events">Événements</Link></li>
      </ul>
      <Routes>
        <Route path="/events" element={<EventList />} />
        <Route path="/events/add" element={<EventForm />} />
      </Routes>
      <Footer/>
    </Router>
  );
};

export default App;

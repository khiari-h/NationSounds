import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import Header from './composants/Header/header';
import Footer from './composants/Footer/footer';
import HomePage from './composants/Homepage/HomePage';



const App = () => {
  return (
    <Router>
      <Header />  
      <HomePage />
      <Footer/>
    </Router>
  );
};

export default App;

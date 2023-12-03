import React from 'react';
import { BrowserRouter as Router, Routes, Route, Link } from 'react-router-dom';
import Header from './composants/Header/header';
import Footer from './composants/Footer/footer';



const App = () => {
  return (
    <Router>
      <Header />  
      <Footer/>
    </Router>
  );
};

export default App;

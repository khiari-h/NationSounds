import React from 'react';
import { Link } from 'react-router-dom';
import '../../App.css'; 
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faSignInAlt, faUserPlus } from '@fortawesome/free-solid-svg-icons';

const Header = () => {
  return (
    <header className="header">
      <div className="header-logo">
        <Link to="/">
          <img src="/images/nationsounds1.webp" alt="Logo du Festival" />
        </Link>
      </div>
      <nav className="header-nav">
        <Link to="/programme">Programmation</Link>
        <Link to="/artistes">Artistes</Link>
        <Link to="/infos">Infos Pratiques</Link>
      </nav>
      <div className="header-actions">
        <Link to="https://site-de-billetterie.com" className="btn-primary" target="_blank">
  Acheter des Billets
        </Link>
        <Link to="/login" className="link-secondary">
          <FontAwesomeIcon icon={faSignInAlt} /> Connexion
        </Link>
        <Link to="/signup" className="link-secondary">
          <FontAwesomeIcon icon={faUserPlus} /> Inscription
        </Link>
        <button className="menu-hamburger">Menu</button>
      </div>
    </header>
  );
};

export default Header;






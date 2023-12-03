// Footer.js
import React from 'react';
import { Link } from 'react-router-dom';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faTwitter, faFacebook, faInstagram } from '@fortawesome/free-brands-svg-icons';
import '../../App.css'; 

const Footer = () => {
  return (
    <footer className="footer">
      <div className="footer-content">
        <div className="footer-contact">
          <h5>Contact</h5>
          <p>Adresse: 123 Rue du Festival</p>
          <p>Téléphone: (123) 456-7890</p>
          <p>Email: contact@festival.com</p>
        </div>
        <div className="footer-links">
          <h5>Liens Utiles</h5>
          <Link to="/about">À propos</Link>
          <Link to="/terms">Conditions d'utilisation</Link>
        </div>
        <div className="footer-social">
          <h5>Réseaux Sociaux</h5>
          <Link to="//twitter.com"><FontAwesomeIcon icon={faTwitter} /></Link>
          <Link to="//facebook.com"><FontAwesomeIcon icon={faFacebook} /></Link>
          <Link to="//instagram.com"><FontAwesomeIcon icon={faInstagram} /></Link>
        </div>
        <div className="footer-newsletter">
          <h5>Newsletter</h5>
          <form>
            <input type="email" placeholder="Votre email" />
            <button type="submit">S'inscrire</button>
          </form>
        </div>
      </div>
      <div className="footer-legal">
        <p>© 2023 NationSounds. Tous droits réservés.</p>
      </div>
    </footer>
  );

};

export default Footer;

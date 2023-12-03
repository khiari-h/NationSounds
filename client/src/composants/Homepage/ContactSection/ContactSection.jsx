import React from 'react';
import '../../../App.css';

const ContactSection = () => {
    return (
        <div className="contact-section">
            <h2>Contactez-Nous</h2>
            <p>Des questions ? Envoyez-nous un message !</p>
            <form>
                <input type="text" placeholder="Votre nom" />
                <input type="email" placeholder="Votre email" />
                <textarea placeholder="Votre message"></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    );
};

export default ContactSection;
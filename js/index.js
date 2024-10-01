const headerSelector = document.querySelector('header')

// Creeër de elementen
const container = document.createElement('section');

// Right div & left div
const divRight = document.createElement('div');
const divLeft = document.createElement('div')
divRight.classList.add('divRight')


// Maak een h1 element voor de titel
const title = document.createElement('h1');
title.classList.add('title');
title.textContent = 'VITALIS SYSTEM';

const headerTitle = document.createElement('h1');
headerTitle.textContent = 'Verdien Geld en Maak een Verschil'
headerTitle.id = 'headerTitle'

// Maak een p element voor de tekst
const text = document.createElement('h3');
text.textContent = "Wil jij ook geld verdienen door bij te dragen aan de gezondheidszorg? Meld je bij ons aan en maak een impact!"

const aanmeldButton = document.createElement('a');
aanmeldButton.textContent = 'Nu aanmelden!';
aanmeldButton.href = 'register.php'

// Maak een img element voor het logo
const headerBannerImage = document.createElement('img');
headerBannerImage.id = 'header-banner-image';
headerBannerImage.src = 'img/header-banner.png'; // Stel de bron van de afbeelding in

// Voeg de elementen toe aan de div

divRight.appendChild(text);
divRight.appendChild(aanmeldButton)
divLeft.appendChild(headerBannerImage);


container.appendChild(divLeft)
container.appendChild(divRight)


// Voeg de div toe aan het document body
headerSelector.appendChild(title);
headerSelector.appendChild(headerTitle)
headerSelector.appendChild(container);




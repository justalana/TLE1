// Maak een div element
const divRight = document.createElement('div');
const divLeft = document.createElement('div')
const headerSelector = document.querySelector('header')

// Maak een h1 element voor de titel
const title = document.createElement('h1');
title.classList.add('title'); // Voeg de klasse 'title' toe
title.textContent = 'VITALIS SYSTEM'; // Stel de tekst in


// Maak een p element voor de tekst
const text = document.createElement('p');
text.classList.add('text'); // Voeg de klasse 'text' toe
text.textContent = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus finibus porta. In viverra mauris quam, vel elementum turpis rhoncus a. Duis sit amet consectetur justo. Morbi varius, est a bibendum tempor, risus erat tempor dui, ac hendrerit lorem purus id est. Phasellus posuere gravida nulla, eget cursus justo iaculis eget. Sed vitae augue mollis, malesuada nisl nec, sagittis est. Suspendisse consectetur at leo id molestie. Donec sagittis ante eu lacus egestas, vel molestie lacus viverra. Donec ornare elit vel erat accumsan, et rutrum orci aliquam.';

// Maak een img element voor het logo
const image = document.createElement('img');
image.src = 'img/vitalislogo.png'; // Stel de bron van de afbeelding in

// Voeg de elementen toe aan de div
divLeft.appendChild(title);
divLeft.appendChild(text);
divRight.appendChild(image);

// Voeg de div toe aan het document body
headerSelector.appendChild(divLeft);
headerSelector.appendChild(divRight)
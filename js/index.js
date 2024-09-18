// Creeër de elementen
const container = document.createElement('section')

// Right div, bevat afbeelding
const divRight = document.createElement('div');


const divLeft = document.createElement('div')
divLeft.classList.add('divLeft')





const headerSelector = document.querySelector('header')
// Maak een h1 element voor de titel
const title = document.createElement('h1');
title.classList.add('title');
title.textContent = 'VITALIS SYSTEM';

const headerTitle = document.createElement('h1');
headerTitle.textContent = 'Welcome to MedCorpTest Trials: Your Health, Our Profits'

// Maak een p element voor de tekst
const text = document.createElement('p');
text.textContent = "Overwhelmed by medical debt? At MedCorp, we believe there's a better way to take back control of your financial future. Instead of feeling trapped by bills, why not turn your situation into an opportunity? By participating in our cutting-edge medical trials, you can not only contribute to the advancement of healthcare but also reduce your debt in the process. It’s a chance to be part of something meaningful, all on your terms—your body, your choice. Whether you're passionate about helping others or simply looking for a practical way to ease the burden, MedCorp gives you the opportunity to do both. Make a real difference in the future of medicine while finding financial relief. Your health, your future—let’s make it work for you";

const aanmeldButton = document.createElement('a');
aanmeldButton.textContent = 'Nu aanmelden!';
aanmeldButton.href = 'aanmelden.php'

// Maak een img element voor het logo
const image = document.createElement('img');
image.src = 'img/vitalislogo.png'; // Stel de bron van de afbeelding in

// Voeg de elementen toe aan de div
divLeft.appendChild(headerTitle)
divLeft.appendChild(text);
divLeft.appendChild(aanmeldButton)
divRight.appendChild(image);


container.appendChild(divLeft)
container.appendChild(divRight)


// Voeg de div toe aan het document body
headerSelector.appendChild(title);
headerSelector.appendChild(container);


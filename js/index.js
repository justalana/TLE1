const headerSelector = document.querySelector('header')

// Creeër de elementen
const container = document.createElement('section')

// Right div & left div
const divRight = document.createElement('div');
const divLeft = document.createElement('div')
divRight.classList.add('divRight')


// Maak een h1 element voor de titel
const title = document.createElement('h1');
title.classList.add('title');
title.textContent = 'VITALIS SYSTEM';

const headerTitle = document.createElement('h1');
headerTitle.textContent = 'Uw Schulden, Onze Zorgen'
headerTitle.id = 'headerTitle'

// Maak een p element voor de tekst
const text = document.createElement('h3');
text.textContent = "Overweldigd door medische schulden? Bij Vitalis Systeem geloven we dat er een betere manier is om de controle over uw financiële toekomst terug te nemen. In plaats van gevangen te zitten door rekeningen, waarom niet uw situatie omzetten in een kans? Door deel te nemen aan onze baanbrekende medische proeven, kunt u niet alleen bijdragen aan de vooruitgang van de gezondheidszorg, maar ook uw schuld verminderen tijdens het proces. Het is een kans om deel uit te maken van iets betekenisvols, allemaal op uw voorwaarden - uw lichaam, uw keuze. Of u nu gepassioneerd bent over het helpen van anderen of gewoon op zoek bent naar een praktische manier om de last te verlichten, Vitalis System biedt u de kans om beide te doen. Bovendien, kunt u ook uw zorgpremie alvast vooruit betalen door deel te nemen aan onze onderzoeken, zodat u minder financiële zorgen heeft en meer tijd heeft voor de dingen die echt belangrijk zijn. Maak een echt verschil in de toekomst van de geneeskunde terwijl u financiële verlichting vindt. Uw gezondheid, uw toekomst - laten we het voor u laten werken."

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




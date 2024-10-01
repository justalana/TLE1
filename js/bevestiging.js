window.addEventListener("load", () => init())

let bevestigingText = document.getElementById('inschrijving');

const init = () => {
    createElements();
}

function createElements(){
    let newDiv= document.createElement('div');
    newDiv.classList.add('bevestiging');
    bevestigingText.appendChild(newDiv);

    let title = document.createElement('h2');
    title.classList.add('title');
    title.innerText='U heeft zich ingeschreven!';
    newDiv.appendChild(title);

    let explanation = document.createElement('p');
    explanation.classList.add('text');
    explanation.innerText='Vitalis Systems en de gezondheidszorg wilt u graag bedanken voor het meedoen aan een onderzoek. Veel plezier met het geld.';
    newDiv.appendChild(explanation);

    let button= document.createElement('button');
    button.classList.add('home-button');
    button.innerText='Ga terug naar home';
    newDiv.appendChild(button);
    button.addEventListener('click',bevestigingHeader);
}

function bevestigingHeader (){
    window.location.href='index.php';
}
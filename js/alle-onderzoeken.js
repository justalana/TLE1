
function fetchData() {
    fetch('js/onderzoek-data.json') // replace with the URL where the JSON data is located
        .then(response => response.json())
        .then(researchData => {
            loadData(researchData)
        })
        .catch(error => console.error('Error:', error));

}
fetchData();
let headerSelector = document.querySelector('header')
let mainSelector = document.querySelector('main')

function headerGekozenOnderzoeken() {
    // Create a div with a title and a subtitle with the information of the product
    const headerMainDiv = document.createElement('div');
    const headerMainTitle = document.createElement('h1');
    const headerSubTitle = document.createElement('h2');
    const headerAnchor = document.createElement('a');


    // Give the elements a unique id so you can adjust its style later on
    headerMainDiv.id = 'headerMainDiv';

    // Assign context to the elements
    headerMainTitle.textContent = "Meeste Gekozen Onderzoek";
    headerSubTitle.textContent = "Informatie over de onderzoek,Informatie over de onderzoek,Informatie over de onderzoek,Informatie over de onderzoek,Informatie over de onderzoek"
    headerAnchor.textContent = "Meer Informatie"


    headerMainDiv.appendChild(headerMainTitle)
    headerMainDiv.appendChild(headerSubTitle)
    headerMainDiv.appendChild(headerAnchor)

    headerSelector.appendChild(headerMainDiv)


}
headerGekozenOnderzoeken()


function loadSearchFilter() {
    // create a search filter bar where you can search the reserach you want
    const searchFilterDiv = document.createElement('div');
    const searchFilterForm = document.createElement('form');
    const searchFilterLabel = document.createElement('label');
    const searchFilterInput = document.createElement('input');

    searchFilterLabel.textContent = "Op zoek naar een specifiek onderzoek?"

    searchFilterLabel.htmlFor = "zoekOnderzoek"
    searchFilterInput.name = "zoekOnderzoek"
    searchFilterInput.id = "zoekOnderzoek"
    searchFilterInput.setAttribute('type', 'search');

    searchFilterForm.appendChild(searchFilterLabel)
    searchFilterForm.appendChild(searchFilterInput)
    searchFilterDiv.appendChild(searchFilterForm)
    mainSelector.prepend(searchFilterDiv)
}
    loadSearchFilter()

// function loadData(researchData) {
//
//
//     // create a section with all the researchs
//     const sectionContainer = document.createElement('section')
//     for (const data in researchData) {
//         console.log(researchData[data].type)
//         console.log(researchData[data].description)
//         console.log(researchData[data].payout)
//
//         const articleCard = document.createElement('article')
//         const imgageArticle = document.createElement('img');
//         const articleTitle = document.createElement('h2')
//         const articlePayout = document.createElement('h2')
//         const articleParagraph = document.createElement('p')
//         const articleAnchor = document.createElement('a')
//
//
//         // textContent
//         articleTitle.textContent = researchData[data].type
//         articleParagraph.textContent = researchData[data].description
//         articlePayout.textContent = researchData[data].payout
//         articleAnchor.textContent = "Meer Info"
//
//         // id & classes
//         sectionContainer.id = "section-article"
//         articleCard.id = "section-article-cards"
//
//
//         imgageArticle.src = "./img/vitalislogo.png"
//
//
//         articleCard.appendChild(imgageArticle)
//         articleCard.appendChild(articlePayout)
//         articleCard.appendChild(articleTitle)
//         articleCard.appendChild(articleParagraph)
//         articleCard.appendChild(articleAnchor)
//         sectionContainer.appendChild(articleCard)
//     }
//
//
//     mainSelector.appendChild(sectionContainer)
// }

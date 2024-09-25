window.addEventListener("load", () => init())

let date = new Date();
const currentYear = date.getFullYear()
const currentMonth = date.getMonth();
let year = date.getFullYear();
let month = date.getMonth();

let selectedMonth = document.getElementById("month")
let selectedYear = document.getElementById("year")

const months = [
    "Januari",
    "Februari",
    "Maart",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Augustus",
    "September",
    "Oktober",
    "November",
    "December"
];

function init() {
    generateCalendar();
}

selectedMonth.innerHTML = `${months[month]}`;
selectedYear.innerHTML = year;

const monthSelect = (direction) => {
    if (direction === "right") {
        selectedMonth.innerHTML = month++;
            if (month > 11) {
                month = 0
                year++
                selectedYear.innerHTML = year;
            }
        selectedMonth.innerHTML = `${months[month]}`;
    }
    if (direction === "left") {
        selectedMonth.innerHTML = month--;
        if (year === currentYear && month <= currentMonth) {
            month = currentMonth;
        } else if (month < 0) {
            month = 11
            if (year > currentYear) {
                year--
                selectedYear.innerHTML = year;
            }
        }
        selectedMonth.innerHTML = `${months[month]}`
    }
    generateCalendar()
}
document.getElementById("left").addEventListener("click", () => monthSelect("left"));
document.getElementById("right").addEventListener("click", () => monthSelect("right"));



const daysInMonth = (year, month) => new Date(year, month + 1, 0).getDate();
const firstDayOfMonth = (year, month) => new Date(year, month, 1).getDay();
const lastDayOfMonth = (year, month) => new Date(year, month + 1, 0).getDay();

let dateValues = [];

const generateCalendar = () => {
    const numDays = daysInMonth(year, month);
    const firstDay = firstDayOfMonth(year, month) + 6; //de +6 is een workaround waarbij ik later % 7 gebruik, dit is alleen om te fixen zodat het werkt als de 1e dag vd maand zondag is.
    const lastDay = lastDayOfMonth(year, month)
    let dayIndex = 0;
    let rowIndex = 0;

    //vind kalender element & maak het leeg (als nieuwe maand word gegenereert)
    const calendarBody = document.querySelector('.calendar-dates');
    calendarBody.innerHTML = ''; // Leeg de kalender

    //initialize maak eerste row
    let row = document.createElement('tr')
    row.id = `Row${rowIndex}`
    calendarBody.appendChild(row);

    //zorg dat het op de goede dag begint
    for (let i = 0; i < firstDay % 7; i++) {
        const emptyCell = document.createElement('td');
        emptyCell.classList.add('empty-cell');
        emptyCell.textContent = "‎";
        document.getElementById(`Row${rowIndex}`).appendChild(emptyCell);
        dayIndex++;
    }


    // Voeg de dagen van de maand toe
    for (let day = 1; day <= numDays; day++) {
        if (dayIndex >= 7) {
            rowIndex++
            //maak nieuwe row
            const row = document.createElement('tr')
            row.id = `Row${rowIndex}`
            calendarBody.appendChild(row);

            const dayCell = document.createElement('td');
            dayCell.classList.add("clickable");
            dayCell.id = day;
            dayCell.textContent = day;
            document.getElementById(`Row${rowIndex}`).appendChild(dayCell);
            dayCell.addEventListener("click", () => setDay(day));

            dayIndex = 0;

        }
        else {
            const dayCell = document.createElement('td');
            dayCell.classList.add("clickable");
            dayCell.id = day;
            dayCell.textContent = day;
            document.getElementById(`Row${rowIndex}`).appendChild(dayCell);
            dayCell.addEventListener("click", () => setDay(day));
        }

        dayIndex++
    }


    //check hoeveel rows er moeten worden gevuld
    let remainingRows = 5 - rowIndex;

    //vul de row van nu
    for (let i = dayIndex; i < 7; i++) {
        const emptyCell = document.createElement('td');
        emptyCell.classList.add('empty-cell');
        emptyCell.textContent = "‎"; // Lege cel
        document.getElementById(`Row${rowIndex}`).appendChild(emptyCell);
    }
    dayIndex = 0;

    for (let j = 0; j < remainingRows; j++) {
        //Doe rowindex 1 omhoog, en voeg deze row toe
        rowIndex++
        const row = document.createElement('tr')
        row.id = `Row${rowIndex}`
        calendarBody.appendChild(row);

        // Loop door alle dagen die nodig zijn in de row
        for (let k = dayIndex; k < 7; k++) {
            const emptyCell = document.createElement('td');
            emptyCell.classList.add('empty-cell');
            emptyCell.textContent = "‎"; // Lege cel
            document.getElementById(`Row${rowIndex}`).appendChild(emptyCell);
            dayIndex = 0;
        }
    }

    //zorg dat de geselecteerde datum altijd weer word geselecteerd ook als je van maand switcht
    if (year === dateValues[0] && month === dateValues[1]) {
        let dateToSelect = document.getElementById(dateValues[2])
        dateToSelect.classList.add("selected")
    }
    fetchRequest()

}


//Function om een datum te klikken en daarna de waarde daarvan in de hidden form field op te slaan zodat
//PHP het later kan ophalen.
const setDay = (day) => {
    let selectedDate= document.getElementById("selectedDate");
    // let insertValue = Date.parse(`${year}-${month+1}-${day}`)
    selectedDate.value = `${year}-${month+1}-${day}`

    let tempSelected = document.getElementsByClassName("selected")
    for (let tempSelectedElement of tempSelected) {
        tempSelectedElement.classList.remove("selected")
    }


    let selectedElement = document.getElementById(day)
    selectedElement.classList.add("selected")
    dateValues = [year, month, day];
}

const grayAppointments = (appointments) => {
    appointments.forEach(appointment => {
        let tempDate;
        const splitDate = appointment.date.split("-");

        if (`${year}` === splitDate[0] && `${month+1}` === splitDate[1] || `${year}` === splitDate[0] && `0${month+1}` === splitDate[1]) {
            //Check of het 1e nummer van de day value een 0 is (00-09)
            if (Array.from(splitDate[2])[0] == 0) {
                tempDate = splitDate[2].slice(0)[1];
            }
            else {
                tempDate = splitDate[2];
            }
            const currentSelected = document.getElementById(tempDate);

            if (currentSelected) {
                // Clone the element to remove all event listeners
                const newElement = currentSelected.cloneNode(true);

                // Replace the original element with the cloned one
                currentSelected.parentNode.replaceChild(newElement, currentSelected);

                // Add the 'filled' class
                newElement.classList.remove("clickable");
                newElement.classList.add("filled");
            }
        }
    });
}

const fetchRequest = () => {
    fetch('js/filleddates.json')
        .then(response => response.json()) // Parse de JSON respons
        .then(data => {
            grayAppointments(data.posts); // Bijvoorbeeld een functie om afspraken op de kalender te markeren
        })
        .catch(error => {
            console.error('Er is een fout opgetreden bij het laden van de afspraken:', error);
        });
}

// Roep de functie aan om de kalender te genereren
init()


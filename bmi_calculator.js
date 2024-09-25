window.addEventListener('load', init);

function init() {
    const weightInput = document.getElementById('gewicht');
    const heightInput = document.getElementById('lengte');

    weightInput.addEventListener('input', calculateBMI);
    heightInput.addEventListener('input', calculateBMI);
}

function calculateBMI() {
    const weight = document.getElementById('gewicht').value;
    const height = document.getElementById('lengte').value;

    const bmi = weight / (height / 100 * height / 100);

    document.getElementById('bmi').value = bmi.toFixed(2);

    // Send the calculated BMI value to the PHP file using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('bmi=' + bmi);

    // Update the PHP file in real-time
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('BMI value updated in PHP file');
        } else {
            console.log('Error updating BMI value in PHP file');
        }
    }
}
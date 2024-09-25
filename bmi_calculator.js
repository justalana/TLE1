function calculateBMI() {
    const weight = document.getElementById('weight').addEventListener('input', calculateBMI);
    const height = document.getElementById('height').addEventListener('input', calculateBMI);

    const bmi = weight / (height * height);

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
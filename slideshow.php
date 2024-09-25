<?php
/** @var mysqli $db */

require_once 'connection.php';

$query = 'SELECT * FROM experiments';

$result = mysqli_query($conn, $query)
or die('Error '.mysqli_error($conn).' with query '.$query);

$experiments = [];

while($row = mysqli_fetch_assoc($result)) {
    $experiments[] = $row;
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/slideshow.css">
    <title>Document</title>
</head>
<body>

    <script type="text/javascript">
        window.addEventListener('load', init);

        let image = ["images/zorg_1.jpg","images/zorg_2.jpg","images/zorg_3.jpg", "images/zorg_4.jpg", "images/zorg_5.jpg", "images/zorg_6.jpg", "images/zorg_7.jpg", "images/zorg_8.jpg", "images/zorg_9.jpg", "images/zorg_10.jpg"];
        let money= []
        let title= []
        let description= []

        <?php foreach ($experiments as $experiment) {?>


        money.push("<?= $experiment['money'] ?>");
        title.push("<?= $experiment['experiment'] ?>");
        description.push("<?= $experiment['explenation'] ?>");

        <?php } ?>

        let imageNumber = 0;
        let imageLength = image.length -1;

        function change_image(number){
            imageNumber += number;

            if (imageNumber > imageLength){
                imageNumber = 0;
            }

            if (imageNumber < 0){
                imageNumber = imageLength ;
            }

            slider.style.backgroundImage = `url(${image[imageNumber]})`
            document.getElementById('title').innerHTML= title[imageNumber];
            document.getElementById('description').innerHTML = description[imageNumber];
            document.getElementById('money').innerHTML = money[imageNumber];

            changeColor();
            return false;
        }

        let slider, bottom, buttons;

        function init(){
            setInterval("change_image(1)", 3000);
            slider = document.querySelector('.slider');
            bottom = document.querySelector('.bottom');

            slider.style.backgroundImage = `url(${image[0]})`
            document.getElementById('title').innerHTML = title[0];
            document.getElementById('description').innerHTML = description[0];
            document.getElementById('money').innerHTML = money[0];

            for (let i=0; i<imageLength +1; i++){
                let div = document.createElement('div');
                div.className = 'button';
                bottom.appendChild(div);
            }

            buttons = document.querySelectorAll('.button');
            buttons[0].style.backgroundColor = 'black';

            buttons.forEach((button, i) =>{
                button.addEventListener('click', ()=>{
                    resetBG();
                    imageNumber = i;
                    slider.style.backgroundImage = `url(${image[imageNumber]})`;
                    document.getElementById('title').innerHTML = title[imageNumber];
                    document.getElementById('description').innerHTML = description[imageNumber];
                    document.getElementById('money').innerHTML = money[imageNumber];
                    button.style.backgroundColor = 'black';
                });
            });
        }

        function resetBG() {
            buttons.forEach(button => button.style.backgroundColor = 'transparent');
        }

        function changeColor() {
            resetBG();
            buttons[imageNumber].style.backgroundColor = 'black';
        }

    </script>

    <table>
    <tr>
        <td align="left">
            <a href="javascript:void(0)" onclick="return change_image(-1)">
                <img class="arrow" src="images/arrow-left.jpg" alt="previous">
            </a>
        </td>
        <td class="slider">
            <div class="title" id="title"></div>
            <div class="description" id="description"></div>
            <div class="money" id="money"></div>
        </td>
        <td align="right">
            <a href="javascript:change_image(1)">
                <img class="arrow" src="images/arrow-right.jpg" alt="next">
            </a>
        </td>
    </tr>
</table>

    <div class="bottom"></div>

</body>
</html>

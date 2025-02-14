<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Addition with Emojis</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            text-align: center;
            padding: 20px;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            overflow-x: hidden;
        }

        h1 {
            font-size: 5vw;
            color: #ff6347;
            margin-bottom: 20px;
        }

        .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            width: 90%;
            max-width: 600px;
            margin: auto;
        }

        .image-row-container {
            border: 2px solid #ff6347;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
        }

        .image {
            font-size: 8vw;
            margin: 5px;
            transition: transform 0.5s ease;
        }

        .input-container {
            margin-top: 20px;
        }

        .input-container input {
            padding: 10px;
            font-size: 5vw;
            width: 20vw;
            max-width: 100px;
            text-align: center;
            margin-right: 10px;
            border: 2px solid #ff6347;
            border-radius: 8px;
        }

        .input-container button {
            padding: 10px 20px;
            font-size: 5vw;
            background-color: #ff6347;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .input-container button:hover {
            background-color: #ff4500;
        }

        .result {
            font-size: 6vw;
            margin-top: 20px;
            color: green;
        }

        .thumbs {
            font-size: 8vw;
            margin-left: 10px;
        }

        .next-button {
            padding: 10px 20px;
            font-size: 5vw;
            background-color: #32cd32;
            color: white;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            cursor: pointer;
        }

        .next-button:hover {
            background-color: #228b22;
        }

        /* Responsive Moving GIF */
        #movingGif {
            position: absolute;
            width: 15vw;
            max-width: 100px;
            height: auto;
            display: none;
        }
    </style>
</head>
<body>

    <img src="/images/butterfly1.gif" id="movingGif" alt="Moving GIF">

    <script>
        function moveGif() {
            const gif = document.getElementById("movingGif");
            const maxX = window.innerWidth - gif.clientWidth;
            const maxY = window.innerHeight - gif.clientHeight;

            const randomX = Math.random() * maxX;
            const randomY = Math.random() * maxY;

            gif.style.left = `${randomX}px`;
            gif.style.top = `${randomY}px`;
            gif.style.display = "block";

            setTimeout(() => {
                gif.style.display = "none";
            }, 2000);
        }

        setInterval(moveGif, 4000);
    </script>

    <h2>Learn Addition</h2>
    <?php
        $number1 = rand(1, 10);
        $number2 = rand(1, 10);
        $emojiList = ['🍎', '🍌', '🍉', '🍓', '🍒', '🍍', '🍑', '🍊', '🍅', '🐶', '🐱', '🐰', '🐭', '🐮', '🐸'];

        function getRandomEmoji($emojiList) {
            return $emojiList[array_rand($emojiList)];
        }
    ?>
    
    <h1><?php echo $number1; ?> + <?php echo $number2; ?></h1>

    <div class="input-container">
        <input type="number" id="sumInput" placeholder="Enter sum" />
        <button onclick="checkAnswer()">Check</button>
    </div>

    <div class="image-container">
        <div id="row1Container" class="image-row-container">
            <?php for ($i = 0; $i < $number1; $i++) { ?>
                <div class="image"><?php echo getRandomEmoji($emojiList); ?></div>
            <?php } ?>
        </div>

        <div id="row2Container" class="image-row-container">
            <?php for ($i = 0; $i < $number2; $i++) { ?>
                <div class="image"><?php echo getRandomEmoji($emojiList); ?></div>
            <?php } ?>
        </div>
    </div>

    <div class="result" id="result"></div>
    <div id="thumbsSection" class="thumbs"></div>

    <button class="next-button" onclick="window.location.reload()">Next</button>

    <script>
        function checkAnswer() {
            const userAnswer = parseInt(document.getElementById('sumInput').value);
            const correctAnswer = <?php echo $number1 + $number2; ?>;

            const thumbsSection = document.getElementById('thumbsSection');
            const resultMessage = document.getElementById('result');

            if (userAnswer === correctAnswer) {
                resultMessage.textContent = 'Correct! Great Job!';
                resultMessage.style.color = 'green';
                thumbsSection.innerHTML = '👍';
                thumbsSection.style.color = 'green';
            } else {
                resultMessage.textContent = `Oops! Try Again. The correct answer is ${correctAnswer}.`;
                resultMessage.style.color = 'red';
                thumbsSection.innerHTML = '👎';
                thumbsSection.style.color = 'red';
            }
        }
    </script>

</body>
</html>

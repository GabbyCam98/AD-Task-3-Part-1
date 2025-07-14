<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Header</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/header.css">

</head>

<body>
    <header>
        <div class="left-section">
            <a href="../../index.php">
                <img src="../../assets/img/travelez-green.png" alt="travelEZ logo">
            </a>
        </div>
        <div class="middle-section">
        </div>
        <div class="right-section">
            <p class="date-box">
                <?php
                echo date("d F Y") . ", " . date("D");
                ?>
            </p>
            <button class="nav-header">About Us</button>
        </div>
    </header>
</body>

</html>
<?php
require_once BASE_PATH . '/bootstrap.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelEZ - About Us</title>
    <link rel="icon" href="../../assets/img/travelez-icon-green.png">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/sections.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">

</head>

<body>

    <!-- header section -->
    <?php
    include_once TEMPLATES_PATH . '/header.component.php';
    ?>

    <main>

        <div class="about-section">
            <h1>Our Story</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas rutrum lectus non iaculis. Integer
                mattis ut quam faucibus ultrices. Curabitur eu lacus ornare, fringilla sem eu, rhoncus nibh. Etiam
                dignissim sit amet ante a suscipit. Nullam eget tellus turpis. Donec efficitur nisi turpis, at egestas
                sapien viverra sit amet. Nullam vel efficitur tortor. Nulla mollis nisi non risus consectetur, et
                pellentesque mi ornare.</p>

            <p>Donec sed ante placerat, dictum dui at, pulvinar sapien. Etiam a tortor ante. Proin et massa molestie,
                varius metus at, facilisis nisi. Nullam ac metus accumsan, rutrum est et, interdum ipsum. Aenean
                interdum ante id dictum cursus. Etiam sit amet sapien quis urna varius ultricies. Maecenas aliquam
                libero at ipsum fringilla, vitae condimentum metus sagittis. Cras suscipit arcu sed lorem venenatis
                elementum. Sed vitae auctor sapien, sed fringilla enim. Maecenas varius quam non dolor euismod cursus.
                Fusce quis magna libero. Suspendisse risus nulla, accumsan at dictum quis, vestibulum ut erat. Curabitur
                non ex nulla. Nunc nisl nunc, venenatis ac diam ac, cursus condimentum elit. Pellentesque et erat
                ligula. In venenatis pellentesque metus, id sodales tellus porttitor malesuada.</p>

            <p>Nam ac cursus odio. Nunc finibus turpis a leo pellentesque porttitor. Suspendisse vitae vestibulum
                velit. Nunc nec consectetur nisi, et blandit nisi. Sed elementum eu nulla eget cursus. Ut cursus luctus
                facilisis. Duis auctor at diam quis tempor. Vivamus sed tortor at est lacinia tincidunt non ut urna. In
                vulputate pellentesque nisi, in mollis felis volutpat a. Nam eu volutpat quam. Quisque ultrices lectus
                sed augue sagittis fermentum. Pellentesque ut ligula sit amet ipsum pretium varius.
            </p>
            <?php
            include_once TEMPLATES_PATH . '/returnButton.component.php';
            ?>
        </div>

        </div>

    </main>


    <!-- footer section -->
    <?php
    include TEMPLATES_PATH . '/footer.component.php';
    ?>

</body>

</html>
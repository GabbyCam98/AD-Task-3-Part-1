<?php
require_once LAYOUTS_PATH . '/main.layout.php';

$pageCss = [
    '/assets/css/style.css',
    '/assets/css/header.css',
    '/assets/css/footer.css',
    'assets/css/about.css'
];

renderMainLayout(function () {
    ?>
    <div class="overlay"></div>
    <div class="page">

        <div class="container about-section">
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

            <div class="action-buttons"><a href="/index.php" class="btn-2">Return to home</a></div>
        </div>

    </div>

<?php }, 'About Us', ['css' => $pageCss]) ?>
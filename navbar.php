<html>

<head>
    <title>navbar</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>

<body">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <h4>Bari</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                    </li>
                    <li>
                        <a href="#">
                            <img loading="lazy" src="./images/language.png" height="38" width="38" alt="lang" />
                            <div id="google_translate_element"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Kisan/login.php">Kisan</a></li>
                            <li><a class="dropdown-item" href="Kisan/dashboard.php">dashboard</a></li>
                        </ul>
                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- google taranslate  -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>

</html>
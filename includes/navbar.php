<nav class="navbar navbar-dark navbar-expand-md bg-dark py-3" style="height:47px;top:0px;">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.php">
            <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"></span>
            <span style="height: 32px;width: 64.7px;">Bari</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-5">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link " href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Login
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="kisan/login.php">Kisan</a></li>
                        <li><a class="dropdown-item" href="kisan/dashboard.php">dashboard</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <img loading="lazy" src="./dist/images/GTranslater.png" height="38" width="38" alt="translate" />
                        <div id="google_translate_element"></div>
                    </a>
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
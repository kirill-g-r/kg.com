<!DOCTYPE HTML>
<!--

-->
<html>
<head>
    <title>Charges Counter - Kirill Goryunov, 2015</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="css/style.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body>

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="/">Charges Counter</a></h1>
        <nav id="nav">
            <ul>
                <li class="special">
                    <a href="#" class="menuToggle"><span>Menu</span></a>
                    <div id="menu">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/summary">Summary table</a></li>
                            <!--                            <li><a href="generic.html">Generic</a></li>
                                                        <li><a href="elements.html">Elements</a></li>
                            -->
                            <li><a href="/profile">Profile</a></li>
                            <li><a href="/exit">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main -->
    <article id="main">

        <section class="wrapper style5">
            <div class="inner">


            <div id="template_main_container">

                <?php include 'application/views/'.$content_view; ?>

            </div>


            </div>
        </section>
    </article>

    <!-- Footer -->
    <footer id="footer">
        <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
            <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Charges Counter</li><li> Kirill Goryunov, 2015</li>
        </ul>
    </footer>

</div>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.scrollex.min.js"></script>
<script src="js/jquery.scrolly.min.js"></script>
<script src="js/skel.min.js"></script>
<script src="js/init.js"></script>

<script src="js/pages/charges/charges.js"></script>
<script src="js/pages/summary/summary.js"></script>
<script src="js/pages/profile/profile.js"></script>

</body>
</html>
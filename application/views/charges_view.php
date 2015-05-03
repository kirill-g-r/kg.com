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
        <h1><a href="">Charges Counter</a></h1>
        <nav id="nav">
            <ul>
                <li class="special">
                    <a href="#" class="menuToggle"><span>Menu</span></a>
                    <div id="menu">
                        <ul>
                            <li><a href="/">Home</a></li>
<!--                            <li><a href="generic.html">Generic</a></li>
                            <li><a href="elements.html">Elements</a></li>
-->
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



                <section>
                    <h4>CHARGES</h4>
                    <form method="post" action="#">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <input type="text" name="charge_name" id="charge_name" value="" placeholder="Name" />
                            </div>
                            <div class="6u$ 12u$(xsmall)">
                                <input type="text" name="charge_coast" id="charge_coast" value="" placeholder="Coast" />
                            </div>
                            <div class="12u$">
                                <div class="select-wrapper">
                                    <select name="demo-category" id="demo-category">
                                        <option value="">- Category -</option>
                                        <option value="1">Transport</option>
                                        <option value="1">Food</option>
                                        <option value="1">Fees</option>
                                        <option value="1">Other</option>
                                    </select>
                                </div>
                            </div>
<!--
                            <div class="4u 12u$(small)">
                                <input type="radio" id="demo-priority-low" name="demo-priority" checked>
                                <label for="demo-priority-low">Low</label>
                            </div>
                            <div class="4u 12u$(small)">
                                <input type="radio" id="demo-priority-normal" name="demo-priority">
                                <label for="demo-priority-normal">Normal</label>
                            </div>
                            <div class="4u$ 12u$(small)">
                                <input type="radio" id="demo-priority-high" name="demo-priority">
                                <label for="demo-priority-high">High</label>
                            </div>
                            <div class="6u 12u$(small)">
                                <input type="checkbox" id="demo-copy" name="demo-copy">
                                <label for="demo-copy">Email me a copy</label>
                            </div>
                            <div class="6u$ 12u$(small)">
                                <input type="checkbox" id="demo-human" name="demo-human" checked>
                                <label for="demo-human">Not a robot</label>
                            </div>
                            <div class="12u$">
                                <textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
                            </div>
-->
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="button" value="Add new" class="special" onclick="addNewCharge()"/></li>
                                    <li><input type="reset" value="Reset" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>

                <br/>

                <section>
                    <h5>summary table</h5>
<div id="charges_main_list">asd</div>
                    <div class="table-wrapper">
                        <table class="alt" >
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                foreach ($data as $d) {

                                    echo '<tr><td>'.$d['name'].'</td><td>'.$d['coast'].'</td><td>'.$d['time'].'</td></tr>';

                                }

                            ?>
                            <tr>
                                <td>Item One</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                            </tr>
                            <tr>
                                <td>Item Two</td>
                                <td>Vis ac commodo adipiscing arcu aliquet.</td>
                                <td>19.99</td>
                            </tr>
                            <tr>
                                <td>Item Three</td>
                                <td> Morbi faucibus arcu accumsan lorem.</td>
                                <td>29.99</td>
                            </tr>
                            <tr>
                                <td>Item Four</td>
                                <td>Vitae integer tempus condimentum.</td>
                                <td>19.99</td>
                            </tr>
                            <tr>
                                <td>Item Five</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td>100.00</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </section>



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

</body>
</html>


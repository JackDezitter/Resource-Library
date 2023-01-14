<?php
session_start();
?>
<!--index page of the site, Users can login, sign-up for an account and search for resources through this page-->
<!doctype html>
<html lang="en">
    <head>
        <!--Head taken from
Title: Blog Template
Authors: Mark Otto, Jacob Thornton, and Bootstrap contributors
Date: 2020
Availability: https://getbootstrap.com/docs/4.4/examples/blog/#
-->

        <script src = "javascript.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.6">
        <!--Adapted page title-->
        <title>Resource Library</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/blog/">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
        <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="blog.css" rel="stylesheet">
        <!--Own CSS File-->
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1 class="title">Library</h1>
            <!--Navbar adapted from
Title: Blog Template
Authors: Mark Otto, Jacob Thornton, and Bootstrap contributors
Date: 2020
Availability: https://getbootstrap.com/docs/4.4/examples/blog/#
-->
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <!--Home button returns to index.php page-->
                    <a class="p-2 directory" onclick="location.assign('index.php')">Home</a>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <!--Own PHP if statements-->
                        <!--If the user is logged in an option button to log out is present in place of a signup or log-in button-->
                        <?php if(!isset($_SESSION["User"])){ ?>    
                        <a class="btn btn-sm btn-outline-secondary directory" href="Sign-up.html">Sign up</a>
                        <a class="btn btn-sm btn-outline-secondary directory" href="Sign-in.html">Sign In</a>
                        <?php } ?>
                        <?php if(isset($_SESSION["User"])){ ?>
                        <a class="btn btn-sm btn-outline-secondary directory" href = "Log-out.php">Log-out</a>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center p-4">
                <div class="px-2">
                    <!-- Search form adapted from:
Title: Bootstrap Forms Documentation
Author: Bootstrap
Date: 2020
Availability: https://getbootstrap.com/docs/4.4/components/forms/
-->
                    <!--Search form where inputs are taken to be passed though AJAX and used in an SQL Query in Search.php-->
                    <form name = "searchForm" id="searchForm" class="justify-content-center">
                        <div class="form-group">
                            <input name = "title" id="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <input name = "module" id="module" class="form-control" placeholder="Module">
                        </div>
                        <div class="form-group">
                            <input name = "author" id="author" class="form-control" placeholder="Author">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg directory" >Search</button>
                    </form>
                </div>
            </div>
        </div>



        <!--Jquery Script link
Title: JQuery core
Author: Jquery Foundation
Date:2020
AVailability: http://code.jquery.com/
-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <!--Bootstrap Javascript files
Title:Bootstrap Get Started
Author: Bootstrap
Date: 2020
Availability: https://getbootstrap.com/docs/4.4/getting-started/introduction/
-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!--Own Javascript file-->
        <script src = "javascript.js"></script>
    </body>
</html>

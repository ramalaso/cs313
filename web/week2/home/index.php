<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/medium.css">
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="css/small.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Staatliches&display=swap" rel="stylesheet">
    <title>CSE-341</title>
</head>

<body>
    <nav id="main-nav">
        <div class="container">
            <div class="social">
                <a href="http://facebook.com/raullaredo" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="http://twitter.com/raullaredo" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="http://instagram.com/raullaredo" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="http://youtube.com/raullaredo" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
            </div>
            <ul class="topnav" id="myTopnav">
                <li>
                    <a href="index.php" class="current">Home</a>
                    <a href="projects.php">Projects</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Showcase -->
    <header id="showcase">
        <div class="container">
            <div class="showcase-container">
                <div class="showcase-content">
                    <div class="category category-sports">Programming</div>
                    <h1>Web Backend Development II</h1>
                    <p>This course focuses on the backend development of dynamic, service-oriented web applications.
                        Students will learn how to design and implement web services, how to interact with data storage,
                        and how to use these tools to build functioning web application. </p>
                    <a href="projects.php" target="_blank" class="btn btn-primary">Projects</a>
                </div>
                <section id="home-articles" class="py-2">
                    <div class="container">
                        <h2>Personal Information</h2>
                        <div class="personal-container">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </header>
    <!-- Footer -->
    <footer id="main-footer">
        <div class="container footer-container py-2">
            <div>
                <p>
                    Raul M. Laredo Soria <a href="http://www.byui.edu">www.byui.edu</a> Copyright &copy; All Rigths
                    Reserved <?php echo date("Y-m-d") . "<br>"; ?>
                </p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>

</body>

</html>
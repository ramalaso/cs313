<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
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
                    <a href="index.php">Home</a>
                    <a href="projects.php" class="current">Projects</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Showcase -->
    <main>
        <div class="lesson-container">
            <div class="lesson">
                <div class="number">1</div>
                <div class="lesson-info">
                    <h2 class="lesson-title">Block One: PHP</h2>
                    <a href="" class="lesson-body">
                        L1: Comming soon
                    </a>
                </div>
            </div>
            <div class="lesson">
                <div class="number">2</div>
                <div class="lesson-info">
                    <h2 class="lesson-title">Block Two: Node js</h2>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer id="main-footer">
        <div class="container footer-container py-2">
            <div>
                <p>
                    Raul M. Laredo Soria <a href="http://www.byui.edu">www.byui.edu</a> Copyright &copy, All Rigths
                    Reserved <?php echo date("Y-m-d") . "<br>"; ?>
                </p>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/styleLogin.css" media="screen" />
    <title>PHP Motors</title>
</head>

<body>
    <div class="container">
        <header>
            <?php require_once "./navbar.php"; ?>
        </header>
        <!-- <nav>
            <?php echo $navList; ?>
        </nav> -->
        <main style="margin-top:120px">
            <div class="containerLogin">
                <form id="form" class="form" action="./accounts/index.php" method="POST">
                    <h2>Register with us</h2>
                    <?php if (isset($_SESSION['message-failed'])) {
            echo "<small>".$_SESSION['message-failed']."</small>" ; } ?>
                    <div class="form-control">
                        <label for="fName">First Name</label>
                        <input type="text" id="fName" placeholder="Enter first name" name="clientFirstname"
                            <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required>
                    </div>
                    <div class="form-control">
                        <label for="lName">Last Name</label>
                        <input type="text" id="lName" placeholder="Enter last name" name="clientLastname"
                            <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?> required>
                    </div>
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Enter email" name="clientEmail"
                            <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?> required>
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Enter password" name="clientPassword" required
                            pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        <span class="passwordLabel">Passwords must be at least 8 characters and contain at least 1
                            number, 1 capital
                            letter and 1 special character</span>
                    </div>
                    <button type="submit" class="submit" id="regbtn">Register</button>
                    <input type="hidden" name="action" value="register">
                </form>
            </div>
        </main>
        <footer>
            <!-- <?php require $_SERVER['DOCUMENT_ROOT'].'/snippets/footer.php'?> -->
    </div>
</body>

</html>
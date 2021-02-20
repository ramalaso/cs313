<?php

require './connections.php';
// Get the accounts model
require './models/accounts-model.php';

require './library/functions.php';

switch ($action) {
    case 'login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($clientPassword);
        
        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
        $message = '<p class="notice">Please provide a valid email address and password.</p>';
        setcookie('message', $message, strtotime('+1 year'), '/');
        //  $_SESSION['message'] = $message;
        header('Location: ../login.php');
        exit;
        }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        setcookie('clientemail',  $clientEmail, strtotime('+1 year'), '/');
        // $clientData = getClient($clientEmail);
        $db = connect();
        $sql = 'SELECT * FROM clients WHERE clientEmail = :clientEmail';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
        $stmt->execute();
        $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
        // Compare the password just submitted against
        // the hashed password for the matching client
        setcookie('clientdatapassword',  'ramalaso', strtotime('+1 year'), '/');
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // $hashCheck = true;
        // If the hashes don't match create an error
        // and return to the login view
        // $hashCheck = true;
        if(!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        setcookie('message', $message, strtotime('+1 year'), '/');
        // $_SESSION['message'] = $message;
        header('Location: ../login.php');
        exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        setcookie('firstname', $clientData['clientFirstname'], strtotime('+1 year'), '/');
        header('Location: ../index.php');
        exit;
        break;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- <script src="jquery-3.2.1.min.js" type="text/javascript"></script> -->
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
        <?php 
        require $_SERVER['DOCUMENT_ROOT'].'/week6/navbar.php'
    ?>
        <nav>
            <!-- <?php echo $navList; ?> -->
        </nav>
        <main style="margin-top:150px">
            <div class="containerLogin">
                <form id="form" class="form" action="." method="POST">
                    <h2>Login</h2>
                    <?php if (isset($_COOKIE['message'])) {
               echo "<small syle='color:red'>".$_COOKIE['message'].$_COOKIE['clientemail']."</small>";
            } ?>
                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Enter email" name="clientEmail" required>
                        <small>Error message</small>
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="password" placeholder="Enter password" name="clientPassword" required
                            pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        <span class="passwordLabel">Passwords must be at least 8 characters and contain at least 1
                            number, 1 capital letter and 1 special character</span>
                        <small>Error message</small>
                    </div>
                    <button type="submit" class="submit">Submit</button>
                    <input type="hidden" name="action" value="login">
                    <a href="./registration.php" class="create">Create an account</a>
                </form>
            </div>
        </main>
        <footer>
            <!-- <?php require $_SERVER['DOCUMENT_ROOT'].'/week6/snippets/footer.php'?> -->
        </footer>
    </div>
</body>

</html>
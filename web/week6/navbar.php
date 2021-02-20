<nav class="navbar navbar-inverse bg-inverse fixed-top bg-faded" style="font-family: 'Varela Round', sans-serif;">
    <div class="row">
        <div class="col navbar-shopping" style="width: 700px">
            <a href="./index.php"><i style="color:white; align: right" class="fas fa-home fa-2x pl-0"></i><span
                    style="color:white; text-align: center; font-size:1.5rem">Shopping LCG</span></a>

            <?php if (isset($_COOKIE['loggedin']) && $_COOKIE['clientData']['clientemail']!='osalamar@gmail.com'){
                echo "<span id='cookie' style='color:white; margin:0 30px; '>Welcome ".($_SESSION['clientData']['clientFirstname'])."</span>
                <a href='./accounts/index.php?action=logout' title='Login or register with LCG Shopping' class='float-right' style='color:white '><i style='color:white; margin:0 10px; '
                class='fas fa-sign-in-alt fa-2x pl-0'>
                    </i>Log out</a> 
                    
                <a href='./shopping-cart.php' class='float-right' style='color:white '><i
                    style='color:white; margin:0 10px; ' class='fas fa-shopping-cart fa-2x pl-0'>
                </i>Shop</a>
                    ";
            } else if (isset($_COOKIE['loggedin']) && $_COOKIE['clientData']['clientemail']=='osalamar@gmail.com') {
                echo "<span id='cookie' style='color:white; margin:0 30px; '>Welcome ".($_SESSION['clientData']['clientFirstname'])."</span>
                <a href='./accounts/index.php?action=logout' title='Login or register with LCG Shopping' class='float-right' style='color:white '><i style='color:white; margin:0 10px; '
                class='fas fa-sign-in-alt fa-2x pl-0'>
                    </i>Log out</a> 
                <a href='./product-page.php' class='float-right' style='color:yellow; margin:0 30px; '><i
                    style='color:yellow;margin-left:'3px' ' class='fas fa-dolly-flatbed fa-2x pl-0'>
                </i>Management</a>
                    ";
            }
            else {
                echo " <a href='./login.php' class='float-right' style='color:white '><i style='color:white; margin:0 10px; '
                class='fas fa-sign-in-alt fa-2x pl-0'>
                    </i>Login</a>
                <a href='./registration.php' class='float-right' style='color:white '><i style='color:white; margin:0 10px; '
                        class='fas fa-user-plus fa-2x pl-0'>
                    </i>Registration</a>";
                    } 
                ?>
            <!-- <a href="./login.php" class="float-right"><i style="color:white; margin:0 30px; "
                    class="fas fa-sign-in-alt fa-2x pl-0">
                </i>Login</a>
            <a href="./registration.php" class="float-right"><i style="color:white; margin:0 30px; "
                    class="fas fa-user-plus fa-2x pl-0">
                </i>Registration</a> -->

        </div>
    </div>
</nav>
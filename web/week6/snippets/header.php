<div id="top-header">
    <img src="/images/site/logo.png" alt="logo" />
    <?php if (isset($_SESSION['loggedin'])){
    echo "<span id='cookie'>Welcome ".($_SESSION['clientData']['clientFirstname'])."</span>
    <a href='../accounts/index.php?action=logout' title='Login or register with PHP Motors'>Log out</a>";
    } else {
    echo " <a href='../accounts/index.php?action=login' title='Login or register with PHP Motors'>My Account</a>";
    } 
    ?>
</div>
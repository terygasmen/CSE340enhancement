<img src="/phpmotors/images/site/logo.png" alt='PHP Motors Logo' id='logo'>
<p><?php 
if ($_SESSION['loggedin']){
    echo "<a href = '/phpmotors/accounts/index.php?action=Logout'>Log Out</a>";
} else {
    echo "<a href = '/phpmotors/accounts/index.php?action=login'>My Account</a>";
}
?>

</p><?php
if($_SESSION['loggedin']){
    echo "<a href = '/accounts/index.php/?action=none' class = 'name-label'>Welcome ".$_SESSION['clientData']['clientFirstname']."</a>";
} ?>
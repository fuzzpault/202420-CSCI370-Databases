<a href="/">Index Page</a>
<a href="lion.php">Lion Page</a>
<?php
    if(isset($_SESSION['email'])){
        // Logged in!
        $email = $_SESSION['email'];
        echo "Hello $email";
        echo '<a href="login.php?logout=t">Logout</a>';

    }else{
        echo '<a href="login.php">Login</a>';
    }
?>
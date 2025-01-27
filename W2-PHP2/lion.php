<html>
    <head>

</head>
<body>
<?php
	include("menu.html");
?>

<h1>This is a lion page</h1>
<form method="get">
    First Name: <input type="text" name="fname" value="<?php echo  $_REQUEST['fname'];?>"/><br>
    Last Name: <input type="text" name="lname" value="<?php echo  $_REQUEST['lname'];?>"/><br>
    Age: <input type="text" name="age" value="<?php echo  $_REQUEST['age'];?>"/><br>

    <input type="submit" value="Click me" />

</form>
<?php
$error = "";

function daysOld($years){
    global $error;
    if($years <= 0){
        $error .= "Years can't be negative";
        return -1;
    }
    if(!is_numeric($years)){
        $error .= "Years must be a number";
        return -1;
    }
    return $years * 365;
}

if( isset($_REQUEST['fname']) and isset($_REQUEST['lname']) and isset($_REQUEST['age']) ){
    echo $_REQUEST['fname'], $_REQUEST['lname'], "<br>";

    $days = daysOld($_REQUEST['age']);
    if($days > 0){
        echo "You are ", $_REQUEST['age'] * 365, " days old!";
    }
}

if($error != ""){
    echo "<div style=\"color:red\">$error</div><br>";
}
//phpinfo();
?>
</body>
</html>
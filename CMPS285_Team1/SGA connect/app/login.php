<?php
ob_start();
include("login.html");
$host = "localhost";
$user= "root";
$pw = "code5";
$db_name = "code5";
$tbl_name = "users";

            //connect to server, select database
        $con = mysqli_connect("$host", "$user", "$pw") or die("cannot connect");
        mysqli_select_db($con, "$db_name") or die ("cannot select db");

        if (isset ($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (isset ($_POST['password'])) {
            $password = $_POST['password'];
        }

        $sql = "SELECT username COUNT(username) AS total FROM users WHERE username= '$username' and password = '$password'";
        $result = mysqli_query($sql);

        $count = mysql_num_rows($result);

        if ($count == 1) {
            header("location:topnav.html");
        } else {
            echo "Invalid username or password.";
        }
ob_end_flush();
?>


<!--
/*function check(form)/*function to check userid & password*/ {
/*the following code checkes whether the entered userid and password are matching*/
/*if (form.username.value == "sga" && form.password.value == "sga") {
window.open('../index.html');
window.close('app/Login.html');
}*/
/*else {
alert("Invalid username/password. Try again.");
/*displays error message*/
-->
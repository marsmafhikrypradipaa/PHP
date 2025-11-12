<?php
$username = $_POST['username'];
$password = $_POST['pass'];
if (($username == "marsma") && ($password == "mars") ||
    ($username == "amir") && ($password == "passamir")) {
    echo "Login sukses";
} else {
    echo "Login gagal";
}
?>
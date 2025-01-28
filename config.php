<?php
$server = "bluebird-db-container";  // 컨테이너 이름 사용
$username = "bluebird_user";
$password = "password";
$database = "bluebirdhotel";

$conn = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die("<script>alert('connection Failed.')</script>");
}
// else{
//     echo "<script>alert('connection successfully.')</script>";
// }
?>

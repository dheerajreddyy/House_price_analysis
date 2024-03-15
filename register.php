<?php
if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
    $con = mysqli_connect("localhost","root", "", "houseprices") or die("connection failed" . mysqli_connect_error());
    if(isset($_POST['username']) && isset($_POST['email'])  && isset($_POST['password']))
{
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
    $sql = "INSERT INTO `user`(`username`, `email`,`password`) VALUES('$username', '$email','$password')";
   $query = mysqli_query($con,$sql);
   if($query)
   {
    echo "<script>window.location.href='http://localhost/DBMS%20PROJECT/login.html';alert('Registration successfull');</script>";
   }
   else{
    echo "<script>window.location.href='http://localhost/DBMS%20PROJECT/register.html';alert('Error occured');</script>";
   }

}
}
?>  

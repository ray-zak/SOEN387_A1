<?php
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";



// Create connection


// Check connection
if($_POST['EmployementID']){
    $conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
//echo "Connected successfully";

$EID="select EmployementID from Assignment1.Administrator where EmployementID='".$_POST['EmployementID']."'";


$result=false;
$result= mysqli_query($conn,$EID);
$poms = mysqli_fetch_all($result);



if(sizeof($poms)>0){
header("Location: ./AdminPage.php", true, 301);
exit();
header("./AdminPage.php");
echo "Employement ID EXIST ";

}
else{
echo "INVALID Employement ID";
}
    //$result = $conn->query($query_get_courses);



}

echo '<h2>Admin login</h2>';
















?>

<form action="Adminlogin.php" method="post">
   <p> Please input your Employement ID <input type="text" name="EmployementID" /></p>
   

   <input type="submit" name="submit" value="Submit" />
</form>

<a href="./AdminRegister.php"> Registration </a>
<br>
<a href="../index.html"> back to Homepage </a>
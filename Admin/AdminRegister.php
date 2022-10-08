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
echo "Connected successfully";
//$InsertIntoCourse = "INSERT INTO Assignment1.Course (CourseCode,Title,Semester,days,Time,instructor,room,StartDate,EndDate)VALUES ('".$_POST['CourseCode']."',".$_POST['Title'].",".$_POST['Semester'].",".$_POST['days'].",".$_POST['Time'].",".$_POST['instructor'].",".$_POST['room'].",".$_POST['StartDate'].",".$_POST['EndDate'].")";

$InsertIntoCourse="INSERT INTO Assignment1.Administrator (EmployementID,FirstName,LastName,DOB,Email,Address,Phone) VALUES('".$_POST['EmployementID']."','".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['DOB']."','".$_POST['Email']."','".$_POST['Address']."','".$_POST['Phone']."')";
echo $InsertIntoCourse;
    //$result = $conn->query($query_get_courses);
mysqli_query($conn,$InsertIntoCourse);


}

echo '<h2>create A new course</h2>';


echo ("Course Code: " . $_POST['courseCode'] . "<br />\n");
echo ("Title: " . $_POST['Title'] . "<br />\n");















?>

<form action="AdminRegister.php" method="post">
   <p>EmployementID <input type="text" name="EmployementID" /></p>
   <p>first name <input type="text" name="FirstName" /></p>
   <p>last name <input type="text" name="LastName" /></p>
   <p>DOB <input type="date" name="DOB" /></p>
   <p>Email <input type="email" name="Email" /></p>
   <p>address <input type="text" name="Address" /></p>
   <p>phone<input type="text" name="Phone" /></p>
  
   <input type="submit" name="submit" value="Submit" />
</form>

<a href="./Adminlogin.html"> login </a>
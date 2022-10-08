<?php
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";



// Create connection


// Check connection
if($_POST['CourseCode']){
    $conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
echo "Connected successfully";
//$InsertIntoCourse = "INSERT INTO Assignment1.Course (CourseCode,Title,Semester,days,Time,instructor,room,StartDate,EndDate)VALUES ('".$_POST['CourseCode']."',".$_POST['Title'].",".$_POST['Semester'].",".$_POST['days'].",".$_POST['Time'].",".$_POST['instructor'].",".$_POST['room'].",".$_POST['StartDate'].",".$_POST['EndDate'].")";

$InsertIntoCourse="INSERT INTO Assignment1.Course (CourseCode,startDate,Time,EndDate,instructor,Semester,days,room,Title) VALUES('".$_POST['CourseCode']."','".$_POST['StartDate']."','".$_POST['Time']."','".$_POST['EndDate']."','".$_POST['instructor']."','".$_POST['Semester']."','".$_POST['days']."','".$_POST['room']."','".$_POST['Title']."')";
echo $InsertIntoCourse;
    //$result = $conn->query($query_get_courses);
mysqli_query($conn,$InsertIntoCourse);


}

echo '<h2>create A new course</h2>';


echo ("Course Code: " . $_POST['courseCode'] . "<br />\n");
echo ("Title: " . $_POST['Title'] . "<br />\n");















?>

<form action="createCourse.php" method="post">
   <p>Course Code <input type="text" name="CourseCode" /></p>
   <p>Course Title <input type="text" name="Title" /></p>
   <p>Semester <input type="text" name="Semester" /></p>
   <p>Days <input type="text" name="days" /></p>
   <p>Time <input type="time" name="Time" /></p>
   <p>Instructor <input type="text" name="instructor" /></p>
   <p>Room <input type="text" name="room" /></p>
   <p>Start date <input type="date" name="StartDate" /></p>
   <p>End Date <input type="date" name="EndDate" /></p>

   <input type="submit" name="submit" value="Submit" />
</form>

<a href="./AdminPage.html"> Back to Admin page </a>
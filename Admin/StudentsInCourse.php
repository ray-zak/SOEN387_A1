<?php

$servername = "127.0.0.1:3308";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
echo "Connected successfully";


$courseList=[];
$query_get_courses = "select * from Assignment1.Course";
echo $query_get_courses ;
$result = mysqli_query($conn,$query_get_courses);
$soms = mysqli_fetch_all($result);
$i=0;
foreach($soms as $som){
  $courseList[$i]=$som[0];
  $i++;
 echo $som[0];


}

    echo '<pre>'; print_r($courseList); echo '</pre>';


    

?>

<form action="./StudentsInCourse.php" method="post">
  <label for="courses">Choose a course:</label>
  <select id="course" name="course" size="4" multiple>
  <?php 
 
  for($j=0;$j<sizeof($courseList);$j++){
  echo "<option value=".$courseList[$j].">".$courseList[$j]."</option>";
}
  ?>
  </select><br><br>
  <input type="submit">
</form>

<?php
if($_POST['course']){


$studentList=[];
$query_get_students = "select StudentID from Assignment1.RegisteredIn where CourseCode='".$_POST['course']."'";
echo $query_get_students ;
$result = mysqli_query($conn,$query_get_students);
$poms = mysqli_fetch_all($result);
$i=0;
foreach($poms as $som){
  $studentList[$i]=$som[0];
  $i++;
 echo $som[0];



}


echo '<pre>'; print_r($studentList); echo '</pre>';

echo $_POST['course'];

}





?>





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


$studentList=[];
$query_get_students = "select * from Assignment1.Student";

$result = mysqli_query($conn,$query_get_students);
$soms = mysqli_fetch_all($result);
$i=0;
foreach($soms as $som){
  $studentList[$i]=$som[0];
  $i++;
 


}

   


    

?>

<form action="./CourseTakenByStudent.php" method="post">
  <label for="courses">Choose a student:</label>
  <select id="student" name="student" size="4" multiple>
  <?php 
 
  for($j=0;$j<sizeof($studentList);$j++){
  echo "<option value=".$studentList[$j].">".$studentList[$j]."</option>";
}
  ?>
  </select><br><br>
  <input type="submit">
</form>

<?php

if($_POST['student']){


$courseList=[];
$query_get_courses = "select CourseCode from Assignment1.RegisteredIn where StudentID='".$_POST['student']."'";

$result = mysqli_query($conn,$query_get_courses);
$poms = mysqli_fetch_all($result);
$i=0;
foreach($poms as $som){
  $courseList[$i]=$som[0];
  $i++;
// output are the report are printed here 
 echo $som[0];
 echo '<br>';



}




}





?>

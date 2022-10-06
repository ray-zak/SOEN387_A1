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
echo $query_get_students ;
$result = mysqli_query($conn,$query_get_students);
$soms = mysqli_fetch_all($result);
$i=0;
foreach($soms as $som){
  $studentList[$i]=$som[0];
  $i++;
 echo $som[0];


}

    echo '<pre>'; print_r($StudentList); echo '</pre>';


    

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
echo $query_get_courses ;
$result = mysqli_query($conn,$query_get_courses);
$poms = mysqli_fetch_all($result);
$i=0;
foreach($poms as $som){
  $courseList[$i]=$som[0];
  $i++;
 echo $som[0];



}


echo '<pre>'; print_r($courseList); echo '</pre>';

echo $_POST['course'];

}





?>

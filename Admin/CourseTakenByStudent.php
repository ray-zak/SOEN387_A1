<?php

$servername = "127.0.0.1:3306";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Student Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="new_style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#"> <h2>Welcome To Concordia</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.html">Home</a>
      </li>
    </ul>
  
  </div>
</nav>

<section class="Form my-3 mx-5">
    <div class="container">
        <div class="row no-gutters p-3">

         <h1 class=" font-weight-bold text-center">Enter or Search Student ID</h1>

            <form action="./CourseTakenByStudent.php" method="post">
                <div class="search_select_box">

                  <select data-live-search="true" class="w-100" id="student" name="student" size="4" multiple >
                      <?php 

                      for($j=0;$j<sizeof($studentList);$j++){
                      echo "<option value=".$studentList[$j].">".$studentList[$j]."</option>";
                    }
                      ?>
                  </select>

                    <button type="submit" name="submit" value="Submit" class="btn1">Enter</button>
                </div>

            </form>
      </div>
    </div>
</section>


    <div class="container ">
        <div>
            <h2 class=" font-weight-bold text-center">Courses</h2>
        </div>
    <div class="row justify-content-center p-3">
    <div class="col-lg-3">
    <div class="list-group">
    
    <?php

    // added error suppresion operator so when undefined it is not dipslayed   
    if($_POST['student']){

    $courseList=[];
    $query_get_courses = "select CourseCode from Assignment1.RegisteredIn where StudentID='".$_POST['student']."'";

    $result = mysqli_query($conn,$query_get_courses);
    $poms = mysqli_fetch_all($result);
    $i=0;
    foreach($poms as $som){
      $courseList[$i]=$som[0];
      $i++;
    
     echo '<div class="list-group-item py-3">';
     echo '<h5 class="text-center mb-1">';
     echo  $som[0];
     echo '</h5>';
     echo '</div>';

    }

    }else{
        
     echo '<div class="list-group-item py-3">';
     echo  '<h5> No courses to display </h5>';
     echo '</div>';
        
        
        
    }

    ?>
        </div>
        </div>
       </div> 
    </div>

<div class="container">
    <div class="row justify-content-center p-3">
        <p class="text-center"><a href="./AdminPage.php?verified=12345">Back To Admin Page</a></p>
    </div>
</div>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>$(document).ready(function(){
        $('.search_select_box select').selectpicker();
    }) </script>
</body>
</html>


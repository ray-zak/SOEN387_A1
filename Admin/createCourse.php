<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";



// Create connection


// Check connection
if(@$_POST['CourseCode']){
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



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Student Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

<section class="Form my-4 mx-5">
 <div class="container">
    <div class="row no-gutters">
        <div class="col-lg-5">
            <img src="img/course-selection-high-schol-Google-Search.png" class="img-fluid mt-6 ml-5" alt="">
        </div>

        <div class="col-lg-7 px-5 pt-5">
        <div class="form-row">
            <div class="col-lg-7">
                <h1 class=" font-weight-bold text-center">Course Template</h1>
            </div>
        </div>
            
            <form action="createCourse.php" method="post">
                
                <div class="form-row">
                    <div class="col-lg-7">
                         <input type="text" name="CourseCode" class="form-control" placeholder="Course Code" />
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="text" name="Title" class="form-control" placeholder="Course Title" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="text" name="Semester" class="form-control" placeholder="Semester" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="text" name="days" class="form-control" placeholder="Days" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="time" name="Time" class="form-control" placeholder="Time" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="text" name="instructor" class="form-control" placeholder="Instructor" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="text" name="room" class="form-control" placeholder="Room" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="date" name="StartDate" class="form-control" placeholder="Start Date" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <input type="date" name="EndDate" class="form-control" placeholder="End Date" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-7">
                        <button type="submit" name="submit" value="Submit" class="btn1 mt-3 mb-4">Create Course</button>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-lg-7">
                        <p class="text-center"><a href="./AdminPage.php" class="text-center"> Back to Admin page </a></p>
                 </div>
                </div>
                 
            </form>
        </div> 
     </div>
 </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
            
            
            
            
            
            
            


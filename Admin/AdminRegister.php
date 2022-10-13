<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";



// Create connection


// Check connection
if(@$_POST['EmployementID']){
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
$result = mysqli_query($conn,$InsertIntoCourse);
    if(!$result){
        die("Error. something wrong");
    }
    else{
        echo "<h5 style='color: green'> You have successfully registered. You will be redirected to the login page very shortly</h5>";


        echo "<script> 
             setTimeout(()=>{ window.location = './Adminlogin.php' },2000); 
          </script>";

    }

}

//echo '<h2>create A new course</h2>';
//
//
//echo ("Course Code: " . $_POST['courseCode'] . "<br />\n");
//echo ("Title: " . $_POST['Title'] . "<br />\n");















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
     <li class="nav-item">
        <a class="nav-link" href="./AdminPage.php?verified=12345">Admin Page</a>
      </li>
    </ul>
  
  </div>
</nav>

<section class="Form my-4 mx-5">
 <div class="container">
    <div class="row no-gutters">
        <div class="justify-content-center col-lg-5">
                
            <img src="img/699-6997452_administrator-network-icons-system-avatar-computer-transparent-admin.png" class="img-fluid my-4 ml-3" alt="">
     
        </div>

        <div class="col-lg-5 pt-3">
        <div class="form-row">
            <div class="col-lg-7">
                <h1 class=" font-weight-bold text-center">Admin Template</h1>
            </div>
        </div>

         <form action="AdminRegister.php" method="post">
            <div class="form-row">
                <div class="col-lg-7">
                    <input type="text" name="EmployementID" placeholder="EmployementID" />
                </div>
            </div>
                
            <div class="form-row">
                <div class="col-lg-7">
                    <input type="text" name="FirstName" placeholder="FirstName" />
                </div>
            </div>
                
            <div class="form-row">
                <div class="col-lg-7">
                    <input type="text" name="LastName" placeholder="LastName" />
                </div>
            </div>
                
             <div class="form-row">
                <div class="col-lg-7">
                    <input type="date" name="DOB" placeholder="Date of Birth" />
                </div>
            </div>
        
            <div class="form-row">
                <div class="col-lg-7">
                    <input type="email" name="Email" placeholder="Email" />
                </div>
            </div>
             
            <div class="form-row">
                <div class="col-lg-7">
                    <input type="text" name="Address" placeholder="Address" />
                </div>
            </div>
             
             <div class="form-row">
                <div class="col-lg-7">
                    <input type="text" name="Phone" />
                </div>
            </div>
             
            <div class="form-row">
                <div class="col-lg-7">
               <input type="submit" name="submit" value="Submit" class="btn1 mt-3 mb-4" />
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
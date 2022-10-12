<?php
$servername = "127.0.0.1:3306";
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
header("Location: ./AdminPage.php?EID=".$_POST['EmployementID'], true, 301);
exit();
header("./AdminPage.php");
echo "Employement ID EXIST ";

}
else{
die ("INVALID Employement ID");
}
    //$result = $conn->query($query_get_courses);



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

                <img src="img/Salesforce-Admin-Interview-questions.png" class="img-fluid mt-5 ml-5" alt="">
            </div>

            <div class="col-lg-7 px-5 pt-5">
                <h1 class=" font-weight-bold py-3 text-center">Please Log in</h1>
                
                <form action="Adminlogin.php" method="post">
                    
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="text" placeholder="Admin Employment ID" name="EmployementID" / class="form-control my-3 p-4">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-lg-7">
                            
                    
                            <button type="submit" name="submit" value="Submit" class="btn1 mt-3 mb-4">Login </button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                    
                    <p>Register an Employee Here: <a href="./AdminRegister.php">Register</a></p>
                
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-lg-7">
                    <a href="../index.html"> back to Homepage </a>
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











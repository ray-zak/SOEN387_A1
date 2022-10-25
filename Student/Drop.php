<?php
$servername = "127.0.0.1:3306";
$username = "root";
$password = "";



// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Student Page </title>
    <link rel="stylesheet" href="new_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand"> <h2>Welcome To Concordia</h2></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.html">Home</a>
      </li>
    </ul>
  
  </div>
</nav>
<?php

extract($_POST);


//echo $numofcourses;


for ($i=1;$i<=$numofcourses;$i++){
    $v = "course".$i;
    $x= $$v;
    $deleting_query = "delete from Assignment1.RegisteredIn where CourseCode = '$x'";
    $result = mysqli_query($conn,$deleting_query);
    if(!$result){
        die("Error");
    }
    else{
        echo "<div  style=' padding: 2% ;margin: 2%;border-style: solid; border-color: darkgreen; background-color: rgba(0,255,0,0.5); font-weight: bold' >";
        echo  "<h3>".$x." was dropped Successfully </h3>";
        echo "</div>";
        //echo $x." Dropped successfully";
    }

}

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


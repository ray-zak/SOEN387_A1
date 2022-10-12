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

echo "Connected successfully";

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

echo "<a href='StudentPage.html'> Back to main page  </a>";


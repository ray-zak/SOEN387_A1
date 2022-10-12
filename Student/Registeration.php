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

echo "Connected successfully to the database";




extract($_POST);

//echo $studentid;
//
//
//echo "$numofcourses";
//
//$v = strval("course$numofcourses");
//
//$x = $$v;
//
//$m = substr($x,1,-1);
//echo $m;


//echo $x;

$today = date("Y-m-d");

echo $today;
$f_date = date("Y-m-d",strtotime($today.' +10 days'));
echo date($f_date);


$new_courses_added = array();      // courses added by the user

for($i=1;$i<=$numofcourses;$i++) {

    $v = strval("course$i");
    //echo $$v;
    $x = $$v;
    $m = substr($x, 1, -1);
    array_push($new_courses_added , $m);
}




// getting the courses the student has already registered in and remove it


$courses_registered_by_std = "select CourseCode from Assignment1.RegisteredIn where StudentID = '$studentid'";
$Enrolled_courses= mysqli_query($conn,$courses_registered_by_std);

if($Enrolled_courses->num_rows >0){

    if($Enrolled_courses->num_rows+sizeof($new_courses_added) >5 ){

        die("<div style=' padding: 2% ;margin: 2%;border-style: solid; border-color: darkred; background-color: rgba(255,0,0,0.5); font-weight: bold'>
                <h2> Error: You cannot register more than 5 courses per semester </h2> 
                </div>");
    }

    while($row=$Enrolled_courses->fetch_assoc()){

        if(in_array($row["CourseCode"],$new_courses_added)){
            echo "<div style=' padding: 2% ;margin: 2%;border-style: solid; border-color: darkred; background-color: rgba(255,0,0,0.5); font-weight: bold'> Error ";
            echo"<h3>".$row["CourseCode"]."</h3>";
            echo "<p> This course was taken in the past or already registered. The system will remove the course from your Enrollement Cart </p>";
            echo "</div>";

            $index = array_search($row["CourseCode"] , $new_courses_added);
            array_splice($new_courses_added, $index, 1);

        }

    }


}

// getting the start date of of new courses added and remove them if 1 week has passed after the start date


$startdate_query = "select CourseCode , StartDate from Assignment1.Course";
$startdate_result = mysqli_query($conn,$startdate_query);

if(!$startdate_result){
    die("Error: cannot execute query");
}

else{
    if($startdate_result->num_rows>0){
        while($row = $startdate_result->fetch_assoc()){

            $Deadline = date("Y-m-d", strtotime($row["StartDate"]. " + 7 days"));
            //echo $Deadline;
            if(in_array($row["CourseCode"],$new_courses_added) && (strtotime($Deadline) < strtotime($today))){
                echo "<div style=' padding: 2% ;margin: 2%;border-style: solid; border-color: darkred; background-color: rgba(255,0,0,0.5); font-weight: bold'> Error ";
                echo "<h4>".$row["CourseCode"]." cannot be added. too late. more than 7 days passed since its start date </h4>";
                echo "<p>".$row["CourseCode"]." will be removed </p>";
                echo "</div>";

                $index = array_search($row["CourseCode"] , $new_courses_added);
                array_splice($new_courses_added, $index, 1);
            }


        }
    }

}

for($i=0;$i<sizeof($new_courses_added);$i++){


    $Registeration_query = "insert into Assignment1.RegisteredIn (StudentID, CourseCode) values ( '$studentid' , '$new_courses_added[$i]')";
    $result = mysqli_query($conn,$Registeration_query);

    if(!$result){
        die ("Error: Could not execute the query ");
    }
    else{
        echo "<div  style=' padding: 2% ;margin: 2%;border-style: solid; border-color: darkgreen; background-color: rgba(0,255,0,0.5); font-weight: bold' >";
        echo  "<h3>".$new_courses_added[$i]." has been added Succefully </h3>";
        echo "</div>";

    }
}

echo "<hr/>";



echo "<a href='StudentPage.html'> Go back to Home page </a>";







//echo $course2;

$conn->close();

?>

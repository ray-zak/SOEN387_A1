<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Student Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="new_style.css">


<script>
    let i =0;
    function select_course(coursecode){
        i++;
        console.log(coursecode);
        document.getElementById("numofcourses").setAttribute("value", i.toString());
        document.getElementById("add"+coursecode).disabled = true;
        const element = document.createElement("input");
        element .setAttribute("name" , "course"+i);
        element.setAttribute("value", coursecode);
        element.setAttribute("readonly", "true");
        document.getElementById("courses_to_drop").appendChild(element);


    }

    function submit_form (){
        document.getElementById("courses_to_drop").submit();
    }

    function cancel_form (){

        let child = document.getElementById("courses_to_drop").lastElementChild;

        while(child.getAttribute("name")!=="numofcourses"){

            document.getElementById("courses_to_drop").removeChild(child);
            child = document.getElementById("courses_to_drop").lastElementChild;

        }

        const content = document.getElementsByClassName("table")[0];
        const buttons = content.getElementsByTagName("button");
        for (let i=0;i<buttons.length;i++){
            buttons[i].disabled = false;
        }
        i=0;
        document.getElementById("numofcourses").setAttribute("value", i.toString());


    }

</script>
<style>
    .table{
        border-style: solid;
        border-width: medium;
        border-color: black;
    }
    td{
        border-style: inset;

    }
    button{
        cursor: pointer;
    }

</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand"> <h2>Welcome To Concordia</h2></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="StudentPage.html">Student Page</a>
            </li>
        </ul>

    </div>
</nav>

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

//echo $StudentID;
//echo $select;

$query_verify_ID = "select* from Assignment1.Student where StudentID = ".$StudentID."";


$existing_Student = $conn->query($query_verify_ID);

if($existing_Student->num_rows ==0){

    die("<div> <h2>  Denied Access </h2> <p> invalid StudentID </p> </div>");
}

else{
    // to check this query
    $student_courses_query = "select *
        From Assignment1.Course
 where Course.CourseCode in (select CourseCode from Assignment1.RegisteredIn where StudentID = '$StudentID') and Semester = '$select'";


    $student_courses = $conn->query($student_courses_query);

    if($student_courses->num_rows>0){

        echo "<br/> <br/>";
        echo "<div class='py-3'>";
        echo "<div class='row justify-content-center'>";
        echo "<div class='col-auto'>";
        echo"<table class='table table-bordered table-secondary table-sm '>";
        echo "<tr>";
        echo "<th> Course Code </th>";
        echo "<th> Title </th>";
        echo "<th> Semester </th>";
        echo "<th> Days </th>";
        echo "<th> Time </th>";
        echo "<th> instructor </th>";
        echo "<th> Room </th>";
        echo "<th> Start Date </th>";
        echo "<th> End Date</th>";
        echo "<th> Add Course </th>";

        echo "</tr>";

        while ($row = $student_courses->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["CourseCode"] . "</td> <td>" . $row["Title"] . " </td> <td>" . $row["Semester"] . "
                </td> <td>" . $row["days"] . " </td> <td>" . $row["Time"] . "</td> <td>" . $row["instructor"] . " </td> <td>" . $row["room"] . "
                </td> <td> " . $row["StartDate"] . " </td> <td> " . $row["EndDate"] . "</td>";

            $courseCode = strval($row["CourseCode"]);
            echo "<td> <button id='add$courseCode' onclick=select_course('$courseCode')> Select to Drop  </button> </td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "</div>";
        echo"</div>";


        echo "<br/> <br/>";

        echo "<div> ";
        echo "<h4> selected courses </h4>";
//        echo "<label> Number of Courses selected:";
//        echo "<input id='numofcourses' type='text' name='numofcourses' value='0' readonly='true'> </input>" ;
//        echo "</label>";
        echo "<p> Number of Courses selected </p>";
        echo "<form style='display: flex; flex-flow: column nowrap' id='courses_to_drop' method='post' action='Drop.php'>";
        echo "<input id='numofcourses' type='text' name='numofcourses' value='0' readonly='true' class='form-control'> </input>" ;

        echo "</form>";


        echo "<button id='finish_dropping' onclick='submit_form()'> Drop Courses</button>";
        echo "<button id='cancel' onclick='cancel_form()'> Cancel  </button>";

        echo "</div>";
    }
    else{
        echo "<h2> You have no courses for the selected Semester </h2>";
    }

    echo "<a href='StudentPage.html'> Back to main page  </a>";



}
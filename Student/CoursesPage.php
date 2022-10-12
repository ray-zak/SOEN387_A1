


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Student Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="new_style.css">
    
<script>
    coursearray =[];

    function add_course(coursecode){

        console.log(coursecode);
        const numofcourses = document.getElementById("numofcourses");
        numofcourses.setAttribute("value", coursearray.length+1);
        console.log(document.getElementById("courseList").childNodes);

        if(coursearray.length>=5){
            alert(" You cannot add more than 5 courses");
        }
        else{

            if(coursearray.length!==0){
                const deleted_submit_btn = document.getElementById("submit_btn");
                deleted_submit_btn.parentNode.removeChild(deleted_submit_btn);
            }
            coursearray.push(coursecode);
            document.getElementById("add"+coursecode).disabled =true;
            document.getElementById("remove"+coursecode).disabled =false;

            console.log(coursearray);
            const element = document.createElement("input");
            element.setAttribute("type","text");
            element.setAttribute("id",coursecode);
            element.setAttribute('name',"course"+coursearray.length);
            element.setAttribute('value',coursecode);
            element.setAttribute('readonly', 'true');
            element.setAttribute('class','form-control')
            document.getElementById("courseList").appendChild(element);

            const submit_btn = document.createElement("input");
            submit_btn.setAttribute("type","submit");
            submit_btn.setAttribute("value","Finish Enrolling");
            submit_btn.setAttribute("id","submit_btn");
            document.getElementById("courseList").appendChild(submit_btn);
            submit_btn.style.cursor = "pointer";

        }
    }

    function Remove_course(coursecode){
        if(coursearray.includes(coursecode)){
            if(coursearray.length===1){
                const deleted_submit_btn = document.getElementById("submit_btn");
                deleted_submit_btn.parentNode.removeChild(deleted_submit_btn);
            }
            coursearray.splice(coursearray.indexOf(coursecode),1);
            document.getElementById("numofcourses").setAttribute("value", coursearray.length);
            document.getElementById("add"+coursecode).disabled =false;
            document.getElementById("remove"+coursecode).disabled =true;
            const deletedcourse = document.getElementById(coursecode);
            deletedcourse.parentNode.removeChild(deletedcourse);

        }
        else{
            alert("can't remove a course that it is not added");
        }
    }

</script>
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

extract($_POST);

$query_verify_ID = "select* from Assignment1.Student where StudentID = ".$StudentID."";



$existing_Student = $conn->query($query_verify_ID);

if($existing_Student->num_rows ==0){

    die("<div> <h2>  Denied Access </h2> <p> invalid StudentID </p> </div>");
}
else {

    $query_get_courses = "select* from Assignment1.Course where Semester = '$select'";

    //$result = $conn->query($query_get_courses);
    $result = mysqli_query($conn,$query_get_courses);
//    while($row = mysqli_fetch_array($result)) {
//        echo $row['CourseCode'];
//    }

  
    if ($result->num_rows > 0) {
        // output data of each row
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
        echo "<th> Remove Course </th>";

        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["CourseCode"] . "</td> <td>" . $row["Title"] . " </td> <td>" . $row["Semester"] . "
                </td> <td>" . $row["days"] . " </td> <td>" . $row["Time"] . "</td> <td>" . $row["instructor"] . " </td> <td>" . $row["room"] . "
                </td> <td> " . $row["StartDate"] . " </td> <td> " . $row["EndDate"] . "</td>";
                $courseCode = strval($row["CourseCode"]);


            echo "<td> <button id='add.$courseCode.' onclick=add_course('.$courseCode.')> Add </button> </td>";
            
            echo "<td> <button disabled id='remove.$courseCode.' onclick=Remove_course('.$courseCode.')> Remove </button> </td>";

            echo "</tr>";

        }
        echo "</table>";
        echo "</div>";
        echo"</div>";


        echo "<br/> <br/>";
        // added courses
        
        echo " <div class='row justify-content-center my-5'>";
        echo "<div class='col-lg-6'>";
        echo "<form style='display: flex; flex-flow: column nowrap' id='courseList' method='post' action='Registeration.php'>";
        echo "<label class='form-label'> Student ID: ";
        echo "</label>";
        echo "<input type='text'readonly value='$StudentID' , id='studentid' name='studentid' class='form-control'> </input> ";
        
        echo "<label class='form-label'> Number of courses added";
        echo "</label>";
        echo "<input type='text'readonly value='0' , id='numofcourses' name='numofcourses' class='form-control'> </input> ";
        
        echo " <br/>";
        
        echo "</form>";
        
        echo "</div>";
        echo "</div>";
        echo "</div>";


    } else {
        echo "<tr> No course available in this semester </tr>";
        echo "</table>";
        echo "</div>";
    }
    $conn->close();

}
?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
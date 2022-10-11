<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Admin Page </title>
    <link rel="stylesheet" href="new_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <h4 class="text-center mt-5"> Please select one of the options below. Are you:  </h4>
    
    <section class="Form my-4 mx-5">
        <div class="container">
                <div class="row justify-content-center my-5">                   
                    <div class="col-lg-6">
                        <button class=" btn1 btn-lg  mt-3 mb-4 " onclick="window.location='./createCourse.php';">Create a Course</button>
                        <button class=" btn1 btn-lg  mt-3 mb-4 " onclick="window.location='./CourseTakenByStudent.php';">search courses taken by student</button>
                        <button class=" btn1 btn-lg  mt-3 mb-4" onclick="window.location='./StudentsInCourse.php';">search student in course</button>
                    </div>
                </div>
        </div>
    </section>
    
    <div class="container mt-3">
    <div class="row justify-content-center p-3">
        <p class="text-center"><a href="./Adminlogin.php">Back To Admin Login</a></p>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>




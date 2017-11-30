<?php
  session_start();
?>

<!DOCTYPE html>
<HTML>
<head>
<!--<link rel="stylesheet" type="text/css" href="display.css">-->
  <title>My Account</title>
  <h1>My Account</h1>
  <script>
  /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</head>
<style> <?php include 'display.css'; ?> </style>

<body>
<?php
$servername = "dbserver.engr.scu.edu";
$username = 'shu';
$password = 'group2';
$dbname = 'sdb_shu';

$connection = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT * FROM courses WHERE user_id ="."'".$_SESSION['user_id']."';";
$result = $connection->query($sql);
?>
  <!--<button type="button" onclick="location.href='createabook.html'"> Select a course </button> -->
  <div id = "welcome">
<!--    Welcome, -->
  <div class="form_center">
  <div class="form_mate">
  <form action = "addcourse.php" method = "post">
  <fieldset>
      <br><b>Course ID</b><br>
      <input type="text" placeholder="integer only" name="course_id" required>
      <br><b>Course Name</b><br>
      <input type="text" name="name" required>
      <button class = "course-button" type="submit">Add Course</button>
  </fieldset>
  </form>
  </div>
  </div>
  <!--<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Select a Course</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="createabook.html">Course 1</a>
    <a href="createabook.html">Course 2</a>
    <a href="createabook.html">Course 3</a>
  </div>
  -->
  <div id="logout">
    <button onclick="logout();" type="button" class="logout-btn">Logout</button>
  </div>

<table class = "table-rwd">
 <thead>
   <tr>
     <th>Course Name</th>
     <th>Course ID</th>
     <td colspan="2"> </td>
   </tr>
 </thead>
 <tbody>
 <?php
 while($row=$result->fetch_assoc()){
   echo
     "<tr>
       <td>".htmlspecialchars($row['name'])."</td>
       <td>".htmlspecialchars($row['course_id'])."</td>
       <td><button id='select' onclick=\"selectFunction('".htmlspecialchars($row['course_id'])."')\">select</button></a></td>
       <td><button id='deletebutton' onclick=\"deleteFunction('".htmlspecialchars($row['course_id'])."')\">delete</button></td>
      </tr>";
}

$connection->close();

?>
<script>
    selectFunction = function(course) {
        window.location = "accountpage.php?course=" + course;
    }
</script>
<script>
    deleteFunction = function(course) {
        window.location = "delete_course.php?course=" + course;
    }
</script>
</tbody>
</table>
<script src="logout.js"></script>
</body>
</HTML>

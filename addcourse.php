<?php

  session_start();
  $servername = "dbserver.engr.scu.edu";
  $usrname = "shu";
  $pssword = "group2";
  $database = "sdb_shu";

  // Create connection
  $db = mysqli_connect($servername, $usrname, $pssword, $database);

  // Check connection
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  }

  $course_id = $db->real_escape_string($_POST["course_id"]);
  $name = $db->real_escape_string($_POST["name"]);

  if(gettype( mixed $course_id != "integer") {
      echo '<script>alert("Error: Unable to create course. Make sure ID is an integer");</script>';
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teacheraccountpage.php">';
  }

  $sql = "SELECT * FROM courses WHERE course_id ="."'".$course_id."';";
  $result = $db->query($sql);
  if($result->num_rows == 1) {
        echo '<script>alert("Error: Course ID already taken");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teacheraccountpage.php">';
  } else
  {
    $sql = "INSERT INTO courses(course_id, user_id, name) VALUES ('".$course_id."', '".$_SESSION['user_id']."', '".$name."')";
    if ($db->query($sql) === TRUE) {
          echo '<script>alert("You have successfully created a course");</script>';
          echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teacheraccountpage.php">';
    } else {
            echo '<script>alert("Error: Unable to create course");</script>';
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teacheraccountpage.php">';
    }
  }
  $db->close();
?>

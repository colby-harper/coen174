<?php

    session_start();
    $servername = "dbserver.engr.scu.edu";
    $username = "shu";
    $password = "group2";
    $database = "sdb_shu";

    // Create connection
    $db = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

   $sql = "DELETE FROM student_courses WHERE course_id = '".$_GET['course']."' AND user_id = '".$_SESSION['user_id']."';";

   if ($db->query($sql) === TRUE) {
       echo '<script>alert("You have successfully deleted the course");</script>';
       echo '<META HTTP-EQUIV="Refresh" Content="0; URL=studentaccountpage.php">';
   } else {
        echo '<script>alert("Error: Unable to delete course");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=studentaccountpage.php">';
    }

    $db->close();
?>

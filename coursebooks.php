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

    $_SESSION['course'] = $_GET['course'];
    $sql = "SELECT * FROM student_books WHERE user_id ='".$_SESSION['user_id']."' AND course_id = '".$_SESSION['course']."';";
    $result = $db->query($sql);
    $sql = "SELECT * FROM books WHERE  course_id = '".$_SESSION['course']."';";
    $result2 = $db->query($sql);
    if($result->num_rows != $result2->num_rows) 
    {
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bookrank.php">';     
    } else {
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=bookresults.php">';
    }
$db->close();
?>

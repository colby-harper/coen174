<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

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

    $booktitle = $db->real_escape_string($_POST["title"]);
    $authorname = $db->real_escape_string($_POST["author"]);
    $copyrightdate = $db->real_escape_string($_POST["copyright"]);
    $lexilelevel = $db->real_escape_string($_POST["lexile"]);
    $numberofpages = $db->real_escape_string($_POST["pages"]);
    $boolrecommended = $db->real_escape_string($_POST["recommended"]);
    $booktopic = $db->real_escape_string($_POST["topic"]);
    $bookpprotag_n = $db->real_escape_string($_POST["pprotag_n"]);
    $booksprotag_n = $db->real_escape_string($_POST["sprotag_n"]);

    $sql = "INSERT INTO books(title, author, copyright, lexile, pages, topic, pprotag_n, sprotag_n, user_id, course_id, recommend) VALUES ('" .$booktitle. "', '" .$authorname. "','" .$copyrightdate."','".$lexilelevel."','".$numberofpages."','".$booktopic."','".$bookpprotag_n."','".$booksprotag_n."','".$_SESSION['user_id']."', '".$_SESSION['course']."','".$boolrecommended."')";

    if ($db->query($sql) === TRUE) {
        echo '<script>alert("You have successfully added a book");</script>';
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=accountpage.php">';
    } else {
          echo '<script>alert("Error: Unable to create book");</scipt>';
	  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=createbook.php">';
    }

    $db->close();
    ?>

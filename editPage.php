<?php
    session_start();
    $servername = "dbserver.engr.scu.edu";
    $username = 'shu';
    $password = 'group2';
    $dbname = 'sdb_shu';

    $connection = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM books WHERE title ='".$_GET['title']."';";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION['bookid'] = $row['id'];
?>

<!DOCTYPE html>
<HTML>
<head>
  <link rel="stylesheet" type="text/css" href="bookinput.css"/>
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
</head>

<body>
<title>Edit Book</title>
<h1>Book Matching Recommendation System</h1>
<h2>Edit Book Details</h2>
<a href="accountpage.php"><button type="button" class="back-btn">Back</button></a>

  <div class="form_center">
  <div class="form_mate">
  <form action = "editbook.php" method = "post">
  <fieldset>
      <b>Book Title</b><br>
      <input type="text" placeholder="Book Title" id = "title" name="title" value="<?php echo $row['title'];?>">

      <br><b>Author</b><br>
      <input type="text" placeholder="Author's Name" id = "author" name="author" value="<?php echo $row['author'];?>">

      <br><b>Copyright Date</b><br>
      <input type="number" placeholder="Copyright Date" id = "copyright" name="copyright" value="<?php echo $row['copyright'];?>">
      <br><b>Lexile Reading Level</b></br>
      <input type="number" placeholder="Lexile Rate" id = "lexile" name="lexile" required value="<?php echo $row['lexile'];?>">
      <br><b>Number of Pages</b></br>
      <input type="number" placeholder="Number of Pages" id = "pages" name="pages" required value="<?php echo $row['pages'];?>">
      <br><label><b>Recommended</b><br>
      <select name = "recommended">
      <option value="<?php echo $row['recommended'];?>" selected="selected">current</option>
      <option value = "yes"> Yes </option>
      <option value = "No"> No </option>
      </select> <br />
      <br><b>Topic</b></br>
      <input type="text" placeholder="Topic" id = "topic" name="topic" required value="<?php echo $row['topic'];?>">
      <br><b>Primary Protagonist Nature</b></br>
      <input type="text" placeholder="Primary Protagonist Nature" id = "pprotag_n" name="pprotag_n" required value="<?php echo $row['pprotag_n'];?>">
      <br><b>Secondary Protagonist Nature</b></br>
      <input type="text" placeholder="Secondary Protagonist Nature" id = "sprotag_n" name="sprotag_n" required value="<?php echo $row['sprotag_n'];?>">
        <button type="submit">Edit Book</button>
  </fieldset>
  </form>
  </div>
  </div>

  </body>

</HTML>

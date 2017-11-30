<?php
  session_start();
  $servername = "dbserver.engr.scu.edu";
  $username = 'shu';
  $password = 'group2';
  $dbname = 'sdb_shu';

  $connection = mysqli_connect($servername, $username, $password, $dbname);

  $sql = "SELECT DISTINCT topic FROM books WHERE course_id = '".$_SESSION['course']."';";
  $result = $connection->query($sql);
  $sql = "SELECT DISTINCT pprotag_n FROM books WHERE course_id = '".$_SESSION['course']."';";
  $result2 = $connection->query($sql);
  $sql = "SELECT DISTINCT sprotag_n FROM books WHERE course_id = '".$_SESSION['course']."';";
  $result3 = $connection->query($sql);
?>

<!DOCTYPE html>
<HTML>
<head>
  <!--<link rel="stylesheet" type="text/css" href="registration.css"/>-->
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
  <link href="bookrank.css" rel="stylesheet" type="text/css">
</head>

<body>
  <title>Rank Book</title>
  <h1>Book Matching Recommendation System</h1>
  <a href="studentaccountpage.php"><button type="button" class="back-btn">Back</button></a>

  <div id="filter" class="block">
  <div class="title">Rank Preferences</div>

  <ul id="items" class="block_list block_list_words">
    <li><button onclick="showLL()">Lexile Level</button></li>
    <li><button onclick="showCD()">Copyright Date</button></li>
    <li><button onclick="showPC()">Page Count</button></li>
    <li><button onclick="showR()">Recommended</button></li>
    <li><button onclick="showT()">Topic</button></li>
    <li><button onclick="showPN()">Primary Protagonist Nature</button></li>
    <li><button onclick="showSN()">Secondary Protagonist Nature</button></li>
  </ul>
  <!--<form action = "rankbook.php" method = "post">-->
  <form action="bookmatch.php" method = "post">
    <button>Submit</button>
  <!--</form>-->
  </div>

  <div data-force="18" class="block" style="left: 58%; width: 40%;">
      <div class="title">Enter Preference</div>
      <div id="llDiv" style="display:none;">
      <div class="select_mate" data-mate-select="active" >
        <select name = "lexile" onclick="return false;" id="">
          <option value="" >Lexile Level</option>
          <option value = 500> 500 </option>
          <option value = 600> 600 </option>
          <option value = 700> 700 </option>
          <option value = 800> 800 </option>
          <option value = 900> 900 </option>
          <option value = 1000> 1000 </option>
          <option value = 1100> 1100 </option>
        </select>
        <p class="select_option"  onclick="open_select(this)" ></p><span onclick="open_select(this)" class="icon_select_mate" ><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
        <path d="M0-.75h24v24H0z" fill="none"/>
        </svg></span>
        <div class="cont_list_select_mate">
        <ul class="cont_select_int">  </ul> 
      </div>
      </div>
      </div>
      <div id="cdDiv" style="display:none;">
      <div class="select_mate" data-mate-select="active" >
        <select name = "copyright" onclick="return false;" id="">
          <option value="" >Copyright Date</option>
          <option value = 1960> 1960-1969 </option>
          <option value = 1970> 1970-1979 </option>
          <option value = 1980> 1980-1989 </option>
          <option value = 1990> 1990-1999 </option>
          <option value = 2000> 2000-2009 </option>
          <option value = 2010> 2010-present> </option>
        </select>
        <p class="select_option"  onclick="open_select(this)" ></p><span onclick="open_select(this)" class="icon_select_mate" ><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
        <path d="M0-.75h24v24H0z" fill="none"/>
        </svg></span>
        <div class="cont_list_select_mate">
        <ul class="cont_select_int">  </ul> 
      </div>
      </div>
      </div>
      <div id="pcDiv" style="display:none;">
      <div class="select_mate" data-mate-select="active" >
        <select name = "page">
          <option value="" >Page Count</option>
          <option value = "a"> less than 100 </option>
          <option value = "b"> 100-300 </option>
          <option value = "c"> 300-500 </option>
          <option value = "d"> more than 500 </option>
        </select>
        <p class="select_option"  onclick="open_select(this)" ></p><span onclick="open_select(this)" class="icon_select_mate" ><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
        <path d="M0-.75h24v24H0z" fill="none"/>
        </svg></span>
        <div class="cont_list_select_mate">
        <ul class="cont_select_int">  </ul> 
      </div>
      </div>
      </div>
      <div id="rDiv" style="display:none;">
      <div class="select_mate" data-mate-select="active" >
        <select name = "recommended">
          <option value="">Is Recommended?</option>
          <option value = "yes"> yes </option>
          <option value = "no"> no </option>
        </select>
        <p class="select_option"  onclick="open_select(this)" ></p><span onclick="open_select(this)" class="icon_select_mate" ><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
        <path d="M0-.75h24v24H0z" fill="none"/>
        </svg></span>
        <div class="cont_list_select_mate">
        <ul class="cont_select_int">  </ul> 
      </div>
      </div>
      </div>
      <div id="tDiv" style="display:none;">
      <div class="select_mate" data-mate-select="active" >
        <select name = "topic">
          <option value="">Topic</option>
          <?php
          while($row=mysqli_fetch_array($result))
          {
            echo '<option value="'.htmlspecialchars($row['topic']).'">'.htmlspecialchars($row['topic']).'</option>';
          }
          ?>
        </select>
        <p class="select_option"  onclick="open_select(this)" ></p><span onclick="open_select(this)" class="icon_select_mate" ><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
        <path d="M0-.75h24v24H0z" fill="none"/>
        </svg></span>
        <div class="cont_list_select_mate">
        <ul class="cont_select_int">  </ul> 
      </div>
      </div>
      </div>
      <div id="pnDiv" style="display:none;">
      <div class="select_mate" data-mate-select="active" >
        <select name = "primary">
          <option value="">Primary Protagonist Nature</option>
          <?php
          while($row=mysqli_fetch_array($result2))
          {
            echo '<option value="'.htmlspecialchars($row['pprotag_n']).'">'.htmlspecialchars($row['pprotag_n']).'</option>';
          }
          ?>
        </select>
        <p class="select_option"  onclick="open_select(this)" ></p><span onclick="open_select(this)" class="icon_select_mate" ><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
        <path d="M0-.75h24v24H0z" fill="none"/>
        </svg></span>
        <div class="cont_list_select_mate">
        <ul class="cont_select_int">  </ul> 
      </div>
      </div>
      </div>
      <div id="snDiv" style="display:none;">
      <div class="select_mate" data-mate-select="active" >
        <select name = "secondary">
          <option value="">Secondary Protagonist Nature</option>
          <?php
          while($row=mysqli_fetch_array($result3))
          {
            echo '<option value="'.htmlspecialchars($row['sprotag_n']).'">'.htmlspecialchars($row['sprotag_n']).'</option>';
          }
          ?>
        </select>
        <p class="select_option"  onclick="open_select(this)" ></p><span onclick="open_select(this)" class="icon_select_mate" ><svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z"/>
        <path d="M0-.75h24v24H0z" fill="none"/>
        </svg></span>
        <div class="cont_list_select_mate">
        <ul class="cont_select_int">  </ul> 
      </div>
      </div>
      </div>
  </div>
  </form>

  <script src="node_modules/sortablejs/Sortable.js"></script></script>
  <script src="bookrank.js"></script>
</body>

</HTML>

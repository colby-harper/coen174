$servername = "dbserver.engr.scu.edu";
$username = 'shu';
$password = 'group2';
$dbname = 'sdb_shu';

$connection = mysql_connect($servername, $username, $password);
mysql_select_db($dbname, $connection);

$result = mysql_query('SHOW TABLES', $connection) or die('cannot show tables');
while($tableName = mysql_fetch_row($result)) {
    $table = $tableName[0];
    echo '</h3>',$table,'</h3>';
    $result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
    if(mysql_num_rows($result2)) {
        echo '<table cellpadding="0" cellspacing="0" class="db-table">';
        echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
        while($row2 = mysql_fetch_row($result2)) {
            echo '<tr>';
            foreach($row2 as $key=>$value) {
                echo '<td>',$value,'</td>';
            }
            echo '</tr>';
        }
        echo '</table><br />';
    }
}

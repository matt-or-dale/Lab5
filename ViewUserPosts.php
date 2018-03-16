<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "m323m313", "ahj9Eey7", "m323m313");

$uName = $_POST["username"];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else{
      echo "<form action='AdminHome.html'>";
      $query = "SELECT content FROM Posts WHERE author_id = '".$uName."'";
      $result = $mysqli -> query($query);
      echo "<table>";
      echo "<th>". $uName."'s Posts:" ."</th>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td align='center'>" . $row["content"] . "</td>";
        /*$result->free();*/
    }
    echo "<br><input type='submit' value='Admin Home'></form>";
}
/* close connection */
$mysqli->close();
 ?>

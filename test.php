<?php $mysqli = new mysqli("mysql.eecs.ku.edu", "m323m313", "ahj9Eey7", "m323m313");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else{
  $query = "SELECT user_id FROM Users";
  $result = $mysqli -> query($query);
  echo "<select>";
  while ($row = $result->fetch_assoc()) {

    echo "<option value=$row[user_id]>";
    echo $row['user_id'];
    echo "</option>";

  }
  echo "</select>";
}
?>

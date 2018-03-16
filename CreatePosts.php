<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "m323m313", "ahj9Eey7", "m323m313");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else{
  echo "<form method='post' action='CreatePosts.html'>";

  $uName = "";
  $uName = $_POST["username"];
  $uPost = "";
  $uPost = $_POST["userpost"];
  $postID ="";

  if($uName == ""){
    echo "Username cannot be blank.";
  }
  else if($uPost == ""){
    echo "Post cannot be blank.";
  }
  else{
    $query = "SELECT user_id FROM Users WHERE user_id = '".$uName."'";
    $result = $mysqli -> query($query);


    if (!($result->num_rows == 0)) {
      $sql = "INSERT INTO Posts (post_id,content,author_id) VALUES ('".$postID."','".$uPost."', '".$uName."')";
      $mysqli->query($sql);
      echo "Post successfully saved!";
      $result-> free();
    }
    else{
      echo "You must be a user to make a post.";
      $result -> free();
    }

    echo "<br><input type='submit' value='Back'></form>";
  }
}
/* close connection */
$mysqli->close();
 ?>

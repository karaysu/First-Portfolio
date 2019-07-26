<?php
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');

//Connection to Database
try {
  $conn = new PDO("mysql:host=127.0.0.1:49882; dbname=localdb", 'azure', '6#vWHD_$');
  echo "Connected ";
}
catch(PDOException $e) {
  echo "Sorry can't connect";
}

// SQL query
//Using placeholders instead of using variables
$sql = "INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)";

//prepare the query
$cmd = $conn->prepare($sql);

//bind placeholders with information
$cmd->bindParam(':name', $name);
$cmd->bindParam(':email', $email);
$cmd->bindParam(':message', $message);

//step six: execute the query
$cmd->execute();

//show message
echo ' Message Sent. Thank you.';

//step seven: disconnect
$cmd->closeCursor();

?>

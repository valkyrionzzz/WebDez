<?php
session_start();
if (isset($_POST["login-submit"])){

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $user = $_POST["user"];
  $password = $_POST["password"];
  if(filter_var($user,FILTER_VALIDATE_EMAIL)){
    $login_query = "SELECT * FROM accounts WHERE email=?";
  }
  else{
    $login_query = "SELECT * FROM accounts WHERE username=?";
  }
  //$result = $connection->query($login_query);
  $statement = $connection->prepare($login_query);
  
  //there are four different types
  //"s" is string
  //"i" is integer
  //"d" is double (or float)
  //"b" is blob (binary data, eg image)
  $statement->bind_param("s", $user);

  $statement->execute();
  
  $result = $statement->get_result();
  
  if($result->num_rows > 0){
    $userdata = $result->fetch_assoc();
    //check if password matches the one in database
    $stored = $userdata["password"];
    $user_id = $userdata["id"];
    $user_name = $userdata["username"];
    $user_email = $userdata["email"];
    if($password == $stored){                  
      //user has entered the correct password
      echo "Welcome! $user_name";
      $_SESSION["id"] = $user_id;
      $_SESSION["username"] = $user_name;
      $_SESSION["email"] = $user_email;
      
      header('Location: userPage.php');

    }
    else{
      echo "Wrong credentials supplied";
    }
  }
  else{
  }
}

}
?>
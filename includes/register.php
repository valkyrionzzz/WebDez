<?php
session_start();
include("includes/database.php");
if (isset($_POST["register-submit"])){
  
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST"){
  $errors = array();
  $username = $_POST["username"];
  //check if username > 16 chrs
  if(strlen($username)>16 ){
    $errors["username"] = "username too long";
  }
  elseif(strlen($username)<=8){
    $errors["username"] = "username too short (8 characters minimum)";
  }
  $email = $_POST["email"];
  //make user email is valid
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors["email"] = "email address invalid"; 
  }
  $password1 = $_POST["password1"];
  $password2 = $_POST["password2"];
  if($password1 !== $password2){
    $errors["password"] = "passwords do not match";
  }
  
  $errorscount = count($errors);
  if($errorscount==0){
    //insert data into database
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password1"], PASSWORD_DEFAULT);
    //create query string
    $register_query = "INSERT INTO accounts 
    (username, email, password, level, created, lastlogin, active)
    VALUES
    ('$username','$email','$password', 3, NOW(), NOW(), 1)";
    
    //run query against database connection
    $result = $connection->query($register_query);
    
    if($result==false){
      echo "error creating account!";
      //there is an error store error code
      $error_code = mysqli_errno($connection);
      $error_msg = mysqli_error($connection);
      if($error_code == '1062' && stristr($error_msg,'username')){
        $errors["username"] = "username already taken";
      }
      elseif($error_code == '1062' && stristr($error_msg,'email')){
        $errors["email"] = "email already used";
      }
      echo mysqli_error($connection).", code=".$error_code;
    }
    else{
      //NEW STUFF
      
        $user = $username;
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
    $_SESSION["id"] = $user_id;
    $_SESSION["username"] = $user_name;
    $_SESSION["email"] = $user_email;
      
      header('Location: userPage.php');

    }
    else{
      echo "Wrong credentials supplied";
    }
  }
      
      header('Location: userPage.php');
    }
  }
}

?>
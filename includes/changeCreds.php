<?php
session_start();
include("database.php");
if(isset($_POST['changeName'])){
if(htmlspecialchars($_POST['changeu']) == ""){
    echo "This field can't be empty";
}
else{
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST"){
    $newUserName = htmlspecialchars($_POST['changeu']);
    $idOfUser = $_SESSION['id'];
    
    $checkDupe = "SELECT * FROM accounts where username=?";
    
    $statement = $connection->prepare($checkDupe);
    
    $statement->bind_param("s", $newUserName);
    
    $statement->execute();
    
    $result = $statement->get_result();
    
    if($result->num_rows > 0){
        $userdata = $result->fetch_assoc();
        $dbuserName = $userdata["username"];
    }
    else
    echo "good to go";

    if($newUserName == $dbuserName)
    {
        echo "Username already taken";
    }
    else
    {
    
    $changeUsername_query = "UPDATE WebDes.accounts SET username='$newUserName' WHERE id=$idOfUser";
    
    $result = $connection->query($changeUsername_query);
    echo "Username successfully changed";
    
    $_SESSION["username"] = $newUserName;
    }
}
}
}

if(isset($_POST['changePass'])){
if(htmlspecialchars($_POST['changep'])== ""){
    echo "This field can't be empty";
}
else{
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST"){   
    $newPassword = htmlspecialchars($_POST['changep']);
    $idOfUser = $_SESSION['id'];
    
    $password = password_hash($newPassword, PASSWORD_DEFAULT);
    $changePassword_query = "UPDATE WebDes.accounts SET password='$password' WHERE id=$idOfUser";
    $result = $connection->query($changePassword_query);
    
    echo "Password changed";
}
}
}
?>
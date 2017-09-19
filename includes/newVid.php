<?php
session_start();
include("database.php");
if(isset($_POST['test'])){
    
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST"){
        //data to insert
        $vidName = htmlspecialchars($_POST['something']);
        $fullTwitchLink = '<iframe src="https://player.twitch.tv/?autoplay=false&channel='.$vidName.'" autoplay="false" allowfullscreen=false></iframe>';
        
        //create query
        $addVid_query = "INSERT INTO links
        (link, account_id, link_name)
        VALUES
        ('$fullTwitchLink', '{$_SESSION['id']}', '$vidName')";
        
        //run against database
        $result = $connection->query($addVid_query);
        
        if($result==false){
            echo "error entering video!";
        }
        else{
            echo "Video successfully added";
        }
        
   
}
}


?>
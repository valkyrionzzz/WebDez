<?php
session_start();
include("database.php");
if(isset($_POST['deleteAllFromTwitch'])){
    
$method = $_SERVER["REQUEST_METHOD"];
if($method == "POST"){
        //data to insert
        
        $removeVidName = htmlspecialchars($_POST['anotherThing']);
        $idOfUser = $_SESSION['id'];
        $fullTwitchLink = '<iframe src="https://player.twitch.tv/?autoplay=false&channel='.$removeVidName.'" autoplay="false" allowfullscreen=false></iframe>';
        
        //create query
        $deleteVid_query = "DELETE FROM links WHERE account_id=$idOfUser AND link_name='$removeVidName'";
        
        //run against database
        $result = $connection->query($deleteVid_query);
        
        if($result==false){
            echo "error deleting video!";
            echo $removeVidName;
        }
        else{
            echo "Video successfully deleted";
        }
        
   //Delete from links where `account_id` = 1
}
}


?>
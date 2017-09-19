<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
?>

<?php
include("includes/database.php");
include("includes/newVid.php");
include("includes/removeVid.php");

//GET Videos
$video_query = "SELECT * FROM links WHERE account_id='".$_SESSION['id']."'";

$result = $connection->query($video_query);
//check if there are results
if($result->num_rows > 0){
    $video = array();
    while($row = $result->fetch_assoc() ){
        array_push($video,$row);
    }
}
?>

<!DOCTYPE html>
<html>
    <?php $page_title = "Twitch Page";    include("includes/head.php"); include("includes/nav.php");    $counter = 1?>
    <body>
        
        <div class="container">
            <form method="post">
                <input type="text" name="something" id="enterTwitch" value="<?= isset($_POST['something']) ? htmlspecialchars($_POST['something']) : '' ?>" />
                <input type="submit" name="test" id="test" value="Add twitch link" /><br/>
            </form>
            
            <form method="post">
                <input type="text" name="anotherThing" id="deleteAllTwitch" value="<?= isset($_POST['anotherThing']) ? htmlspecialchars($_POST['anotherThing']) : '' ?>" />
                <input type="submit" name="deleteAllFromTwitch" id="deleteAllFromTwitch" value="Delete This Stream" /><br/>
            </form>
            
            <?php
                // if(isset($_POST['test'])) {
                // echo 'You entered: ', htmlspecialchars($_POST['something']);
                // }
            ?>
            
            <?php
            if(count($video) > 0){
                    //counter to count columns
                    $counter = 0;
                    foreach($video as $item){
                        $link = $item["link"];
                        //increment counter by 1
                        $counter++;
                        $total = count($video);
                        if($counter == 1){
                            echo "<div class=\"col-md-4\">";
                        }
                        echo $link;
                        if($counter == 2){
                            echo "</div>";
                            $counter = 0;
                        }
                    }
                }
           
        //   <iframe src="https://player.twitch.tv/?autoplay=false&channel=monstercat" autoplay="false" allowfullscreen=false></iframe>

            ?>
            
        </div>
        
        
    </body>
</html>
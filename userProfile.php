<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
?>

<?php
include("includes/database.php");
include("includes/changeCreds.php");

?>

<!DOCTYPE html>
<html>
    <?php $page_title = "User Profile";    include("includes/head.php"); include("includes/nav.php");    $counter = 1?>
    <body>
        
        
        
        <div class="container">
            <form method="post">
                <input type="text" name="changeu" id="changeUsername" value="<?= isset($_POST['changeu']) ? htmlspecialchars($_POST['changeu']) : '' ?>" />
                <input type="submit" name="changeName" id="changeName" value="Change the Username" /><br/>
            </form>
            
            <form method="post">
                <input type="password" name="changep" id="changePassword" value="<?= isset($_POST['changep']) ? htmlspecialchars($_POST['changep']) : '' ?>" />
                <input type="submit" name="changePass" id="changePass" value="Change the Password" /><br/>
            </form>
            
            
            
        </div>
        
        
    </body>
</html>
<nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a href="userProfile.php" class="navbar-brand"><?php echo $_SESSION['username'] ?></a>
                </div>
                <a href="userPage.php"><img src="pics/twitch.png "alt="Twitch icon" height="50" width="50"></a>
                <a href="#"><img src="pics/twitter.png "alt="Twitch icon" height="50" width="50"></a>
                <a href="#"><img src="pics/facebook.png "alt="Twitch icon" height="50" width="50"></a>
                <submit class="navbar-text navbar-right"><a href="logout.php">Logout</a></submit>
            </div>
        </nav>
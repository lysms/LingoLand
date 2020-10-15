<div id="navBar">
    <a href="../Homepage/homepage.php">myTrips <i class="fas fa-home"></i></a>
    <a href="../Homepage/about.php">About <i class="fas fa-users"></i></a>
    <a href="../Dashboard/dashboard-page.php">Dashboard <i class="fas fa-calendar-alt"></i></a>
    <a href="../Homepage/faq.php">FAQ <i class="fas fa-question"></i></a>
    <!-- <input type="text" name="loadTrips" id="inputtedUsername"/>
    <input type="submit" id="submitUsername"> -->
    <div id="navBar-right" <?php if ($showLoginSignup===true){?>style="display:none"<?php } ?>>
        <a href="../Auth/login.php"><i class="fas fa-user-circle"></i>  Login</a>
        <a href="../Auth/signup.php">Signup</a>
    </div>
    <div id="navBar-right" <?php if ($showLoginSignup===false){?>style="display:none"<?php } ?>>
        <p id="navBar-name"> Welcome, <?php echo $_SESSION["first_name"] . ' ' . $_SESSION["last_name"]; ?></p>

        <a href="../Auth/logout_action.php"><i class="fas fa-user-circle"></i> Logout</a>
    </div>
</div>

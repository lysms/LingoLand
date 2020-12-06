

<nav class="navbar navbar-expand-lg navbar-dark bg-lingoland">
    <a class="navbar-brand" href="../homepage/homepage.php"><img alt="LingoLand" src="../resources/images/LLLQuote.png" width="60px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="../dashboard/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../articles/articles.php">Flashcard Maker</a>
            </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item" <?php if ($showLoginSignup==false){?>style="display:none"<?php } ?>>
                <a class="nav-link" href="../auth/auth.php"><i class="fas fa-user-circle"></i>  Login</a>
        </li>
        <li class="nav-item" <?php if ($showLoginSignup==false){?>style="display:none"<?php } ?>>
                <a class="nav-link" href="../auth/register.php"> Signup</a>
        </li>

        <li class="nav-item" <?php if ($showLoginSignup==true){?>style="display:none"<?php } ?>>
            <a class="nav-link" href="../auth/logout.php"><i class="fas fa-user-circle"></i> Logout</a>
        </li>
        </ul>
    </div>
</nav>
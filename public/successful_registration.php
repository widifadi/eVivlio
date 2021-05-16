<?php require_once("../templates/header.php"); ?>

<div class="container" id="logout-message">
    Registration successful.
    <!-- NOTE: user isn't login yet so we can't use session here to output his name. -->
    <br>
    Welcome to eVivlío! 
    <br>
    <br>
    <a href="signup_login.php">
        <button class="btn btn-info"> Login to start the fun. </button>
    </a>
</div>

<?php require_once("../templates/footer.php"); ?>
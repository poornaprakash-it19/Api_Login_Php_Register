<?php

include("auth_session.php");
require ('db.php')
?>
<?php echo $_SESSION['username'];echo $_SESSION['email']; ?>
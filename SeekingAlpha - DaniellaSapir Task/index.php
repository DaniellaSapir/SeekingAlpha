<?php 
require_once 'initialize.php';



include "partials/header.php";

if (isset($_COOKIE[COOKIE_NAME])) {
?>

    <div class="container">
        <div class="ulist" id="ulist">
            <?php
                include "partials/ulist.php";
            ?>
        </div>
    </div>
<?php
} else {
    require_once('partials/login.php');
}
?>

<?php include "partials/footer.php"; ?>

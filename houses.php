<?php
require_once "includes/db.php";
require_once "templates/header.php";
require_once "templates/nav.php";
require_once "templates/banner.php";
?>
<div class="body_size">
    <div class="body_col">
        <div></div>
        <div class="body_main">
            <?php
                require_once "templates/body_houses.php";
            ?>
        </div>

        </div>
    <div></div>
    </div>
</div>

<?php
require_once "templates/footer.php";
?>
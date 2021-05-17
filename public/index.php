<?php require_once("../templates/header.php"); ?>

<!-- TODO: do some parallax effect -->
<?php require_once("../src/FrontPage/front_page.php"); ?>

<div class="container" style="margin-top: 50px;">
    <?php require_once("../src/FrontPage/front_promo_categories.php"); ?>  
    <br>  
    <?php require_once("../src/FrontPage/front_feature.php"); ?>
</div>

<?php require_once("../templates/footer.php"); ?>

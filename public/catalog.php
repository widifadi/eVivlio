<?php
    require_once("../templates/header.php");
?>

<div class="container">
    <!-- breadcrumbs -->
</div>

<div class="row">
    <div class="col-3">
        <?php require_once("../src/Catalogue/categories.php"); ?>
    </div>
    <div class="col-8">
        <?php require_once("../src/Catalogue/book_list.php"); ?>
    </div>
</div>

<?php 
    require_once("../templates/footer.php");
?>

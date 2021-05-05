<!-- TODO temporary until ajax -->
<?php
    require_once("../templates/header.php");
?>

<div class="row" style="margin-top: 100px">
    <div class="col-3">
        <?php require_once("../src/Catalogue/categories.php"); ?>
    </div>
    <div class="col-8">
        <div class="container catalog-breadcrumbs">
            <a href="catalog.php"> Catalog </a> 
            <i class="fas fa-chevron-right" style="color: grey;"></i>
            <a href=""> Category </a> 
            <i class="fas fa-chevron-right" style="color: grey;"></i>
            <a href=""> Book Title </a>
        </div>
        <?php require_once("../src/Catalogue/book.php"); ?> 
    </div>
</div>

<?php 
    require_once("../templates/footer.php");
?>

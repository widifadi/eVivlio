<!-- TODO temporary until ajax -->
<?php
    require_once("../templates/header.php");
?>

<div class="container">
    <div class="row" style="margin-top: 100px">
        <div class="col-3">
            <?php require_once("../src/Catalogue/categories.php"); ?>
        </div>
        <div class="col-8">
            <div class="container catalog-breadcrumbs">
                <a href="catalog.php?p=all_books"> Catalog </a> 
                <em class="fas fa-chevron-right" style="color: grey;"></em>
                <a href=""> Category </a> 
                <em class="fas fa-chevron-right" style="color: grey;"></em>
                <a href=""> Book Title </a>
            </div>
            <?php require_once("../src/Catalogue/book.php"); ?> 
        </div>
    </div>
</div>

<?php 
    require_once("../templates/footer.php");
?>

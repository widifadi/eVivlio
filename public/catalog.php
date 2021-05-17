<?php
    require_once("../templates/header.php");
?>

<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-3">
            <?php require_once("../src/Catalogue/categories.php"); ?>
        </div>
        <div class="col-9">
            <div class="catalog-breadcrumbs">
                <!-- TODO backend/js code -->
                <!-- breadcrumbs -->
                <a href="catalog.php"> Catalog </a> 
                <em class="fas fa-chevron-right" style="color: grey;"></em>
                <a href=""> Category </a> 
                <!-- <i class="fas fa-chevron-right" style="color: grey;"></i> -->
                <!-- <a href=""> Book Title </a> -->
            </div>
            <!-- TODO if book is clicked on catalog, change to book detail: use AJAX?  -->
            <!-- DEVELOP book_list.php or book.php -->
            <?php require_once("../src/Catalogue/book_list.php"); ?> 
        </div>
    </div>
</div>

<script>
    var admin_btn = $("#catalog-btn").addClass("activePage")
</script>

<?php 
    require_once("../templates/footer.php");
?>

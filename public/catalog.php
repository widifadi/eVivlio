<?php
    require_once("../templates/header.php");
?>

<div class="row" style="margin-top: 100px">
    <div class="col-3">
        <?php require_once("../src/Catalogue/categories.php"); ?>
    </div>
    <div class="col-8">
        <div class="container">
            <!-- breadcrumbs -->
        </div>
        <!-- TODO if book is clicked on catalog, change to book detail: use AJAX?  -->
        <?php require_once("../src/Catalogue/book_list.php"); ?>
    </div>
</div>

<?php 
    require_once("../templates/footer.php");
?>

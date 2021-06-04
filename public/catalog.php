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
                <a href="catalog.php?p=all_books"> Catalog </a> 
                <em class="fas fa-chevron-right" style="color: grey;"></em>
                <?php
                    if (isset($_GET['p']) && $_GET['p'] != "all_books") {
                        $category = $_GET['p'];
                ?>
                    <a href="catalog.php?p=<?php echo $category?>" > 
                        <?php echo $category?> 
                    </a> 
                <?php
                    }
                ?>
            </div>
            <br>
            <div id="message" class="d-flex justify-content-center"></div>
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

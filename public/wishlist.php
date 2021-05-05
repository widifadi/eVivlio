<?php
    require_once("../templates/header.php");
?>

<div class="container">
    <!-- breadcrumbs -->
</div>
<div class="row" style="margin-top: 100px">
    <div class="col-3">
        <?php require_once("../templates/mypage_side_btn.php"); ?>
    </div>
    <div class="col-8">
        <div class="container catalog-breadcrumbs">
                <a href="my_page.php"> My Page </a> > 
                <a href="wishlist.php"> My Wishlist </a>     
        </div>
        <?php require_once("../src/Mypage/mypage_wishlist.php"); ?>
    </div>
</div>

<?php 
    require_once("../templates/footer.php");
?>

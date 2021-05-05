<?php
    require_once("../templates/header.php");
?>


<div class="row" style="margin-top: 100px">
    <div class="col-3">
        <?php require_once("../src/MyPage/mypage_wishlist.php"); ?>
    </div>
    <div class="col-8">
        <div class="container catalog-breadcrumbs">
                <a href="my_page.php"> My Page </a>
        </div>
        <div class="row">
            <?php require_once("../src/MyPage/mypage_details.php"); ?>
        </div>
        <br>
        <div class="row">
            <?php require_once("../src/MyPage/mypage_order_history.php"); ?>
        </div>
    </div> 
</div>

<?php 
    require_once("../templates/footer.php");
?>

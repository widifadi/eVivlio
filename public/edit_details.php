<?php
    require_once("../templates/header.php");
?>


<div class="row" style="margin-top: 100px">
    <div class="col-3">
        <?php require_once("../templates/mypage_side_btn.php"); ?>
    </div>
    <div class="col-8">
        <div class="container catalog-breadcrumbs">
                <a href="my_page.php"> My Page </a> > 
                <a href="edit_details.php"> Edit Details </a>     
        </div>
        <?php require_once("../src/Mypage/edit_details_form.php"); ?>
    </div>
</div>

<?php 
    require_once("../templates/footer.php");
?>

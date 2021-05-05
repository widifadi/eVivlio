<?php
    require_once("../templates/header.php");
?>


<div class="row" style="margin-top: 100px">
    <div class="col-3">
        <?php require_once("../templates/contact_side_btn.php"); ?>
    </div>
    <div class="col-8">
        <div class="container catalog-breadcrumbs">
                <a href="contact.php"> Contact Us </a>
        </div>
        <div class="row">
            <?php require_once("../src/ContactUs/contact_contacts.php"); ?>
        </div>
        <br>
    </div> 
</div>

<?php 
    require_once("../templates/footer.php");
?>

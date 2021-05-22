<?php require_once("../templates/header.php"); ?>

<main>
    <section class="section static">
        <?php require_once("../src/FrontPage/front_page.php"); ?>
    </section>

    <section class="section parallax bg1">
        <?php require_once("../src/FrontPage/front_promo.php"); ?>
    </section>

    <section class="section static">
        <?php require_once("../src/FrontPage/front_categories.php"); ?>
    </section>

    <section class="section parallax bg2">
        <?php require_once("../src/FrontPage/front_feature.php"); ?>
    </section>
</main>

<?php require_once("../templates/footer.php"); ?>

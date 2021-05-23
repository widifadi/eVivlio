<?php require_once("../templates/header.php"); ?>
<div class="container" style="margin-top: 100px; margin-bottom: 20px; margin-left: 10px;">

    <div class="row">

        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active mypage-tab" id="v-pills-store-tab" data-toggle="pill" 
                    href="#v-pills-store" role="tab" aria-controls="v-pills-store" aria-selected="true">
                    About the Store</a>
                <a class="nav-link mypage-tab" id="v-pills-team-tab" data-toggle="pill" 
                    href="#v-pills-team" role="tab" aria-controls="v-pills-team" aria-selected="false">
                    About the Team</a>
            </div>
        </div>

        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" style="margin-left:100px" 
                    id="v-pills-store" role="tabpanel" aria-labelledby="v-pills-store-tab">
                    <?php include("../src/AboutUs/about_store.php") ?>
                </div>



                <div class="tab-pane fade" style="margin-left:100px" 
                    id="v-pills-team" role="tabpanel" aria-labelledby="v-pills-team-tab">
                    <?php include("../src/AboutUs/about_team.php") ?>
                </div>



                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("../templates/footer.php"); ?>

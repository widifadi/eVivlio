<?php require_once("../templates/header.php"); ?>
<div class="container" style="margin-top: 100px; margin-bottom: 20px; ">

    <div class="row">

        <div class="col-3">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active mypage-tab" id="v-pills-store-tab" data-toggle="pill" 
                        href="#store" role="tab" aria-controls="v-pills-store" aria-selected="true">
                        About the Store</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link mypage-tab" id="v-pills-team-tab" data-toggle="pill" 
                        href="#team" role="tab" aria-controls="v-pills-team" aria-selected="false">
                        About the Team</a>
                </li>
            </ul>
        </div>

        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" style="margin-left:100px" 
                    id="store" role="tabpanel" aria-labelledby="v-pills-store-tab">
                    <?php include("../src/AboutUs/about_store.php") ?>
                </div>



                <div class="tab-pane fade" style="margin-left:100px" 
                    id="team" role="tabpanel" aria-labelledby="v-pills-team-tab">
                    <?php include("../src/AboutUs/about_team.php") ?>
                </div>



                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("../templates/footer.php"); ?>

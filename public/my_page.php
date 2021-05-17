<?php require_once("../templates/header.php"); ?>

<div class="container" style="margin-top: 100px; margin-bottom: 20px; margin-left: 10px;">

    <div class="row">

        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active mypage-tab" id="v-pills-personal-tab" data-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Details</a>
                <a class="nav-link mypage-tab" id="v-pills-wishlist-tab" data-toggle="pill" href="#v-pills-wishlist" role="tab" aria-controls="v-pills-wishlist" aria-selected="false">My Wishlist</a>
                <a class="nav-link mypage-tab" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Order History</a>
            </div>
        </div>

        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" style="margin-left:100px" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                    <?php include("../src/MyPage/mypage_details.php") ?>
                </div>


                <div class="tab-pane fade" style="margin-left:100px" id="v-pills-wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
                    <?php include("../src/MyPage/mypage_wishlist.php") ?>
                </div>


                <div class="tab-pane fade" style="margin-left:100px" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                    <?php include("../src/MyPage/mypage_order_history.php") ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var admin_btn = $("#mypage-btn").addClass("activePage")
</script>

<?php require_once("../templates/footer.php"); ?>

<?php require_once("../templates/header.php"); ?>

<div class="container" style="margin-top: 100px; margin-bottom: 20px; margin-left: 10px;">

    <div class="row">

        <div class="col-3">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active mypage-tab" id="v-pills-personal-tab" data-toggle="pill" href="#personal_details" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link mypage-tab" id="v-pills-wishlist-tab" data-toggle="pill" href="#wishlist" role="tab" aria-controls="v-pills-wishlist" aria-selected="false">My Wishlist</a>
                </li>
                <li>
                    <a class="nav-link mypage-tab" id="v-pills-orders-tab" data-toggle="pill" href="#orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Order History</a>
                </li>
            </ul>
        </div>

        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" style="margin-left:100px" id="personal_details" role="tabpanel" aria-labelledby="v-pills-personal-tab">
                    <?php include("../src/MyPage/mypage_details.php") ?>
                </div>


                <div class="tab-pane fade" style="margin-left:100px" id="wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
                    <?php include("../src/MyPage/mypage_wishlist.php") ?>
                </div>


                <div class="tab-pane fade" style="margin-left:100px" id="orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
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

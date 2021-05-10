<?php require_once("../templates/header.php"); ?>

<div class="container" style="margin-top: 100px; margin-bottom: 20px; ">
    <h5>Manage Website</h5>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active pills-admin-tab" id="pills-managebooks-tab" data-toggle="pill" 
                href="#pills-managebooks" role="tab" aria-controls="pills-managebooks"
                aria-selected="true">Books</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link pills-admin-tab" id="pills-manageusers-tab" data-toggle="pill" 
                href="#pills-manageusers" role="tab" aria-controls="pills-manageusers"
                aria-selected="true">Users</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link pills-admin-tab" id="pills-managecustomers-tab" data-toggle="pill" 
                href="#pills-managecustomers" role="tab" aria-controls="pills-managecustomers"
                aria-selected="true">Customers</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link pills-admin-tab" id="pills-manageorders-tab" data-toggle="pill" 
                href="#pills-manageorders" role="tab" aria-controls="pills-manageorders"
                aria-selected="true">Orders</a>
        </li>

        <!-- TODO categories, authors, publishers??? -->
    </ul>

    <div class="tab-content admin-page-tab" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-managebooks" 
            role="tabpanel" aria-labelledby="pills-managebooks-tab">
            <?php include("../src/AdminPage/manage_books.php") ?>
        </div>

        <div class="tab-pane fade" id="pills-manageusers" role="tabpanel"
            aria-labelledby="pills-manageusers-tab">
            <?php include("../src/AdminPage/manage_users.php") ?>
        </div>

        <div class="tab-pane fade" id="pills-managecustomers" role="tabpanel"
            aria-labelledby="pills-managecustomers-tab">
            <?php include("../src/AdminPage/manage_customers.php") ?>
        </div>

        <div class="tab-pane fade" id="pills-manageorders" role="tabpanel"
            aria-labelledby="pills-manageorders-tab">
            <?php include("../src/AdminPage/manage_orders.php") ?>
        </div>
    </div>
</div>

<script>
    var admin_btn = $("#adminpage-btn").addClass("activePage")
</script>

<?php require_once("../templates/footer.php"); ?>

<?php 
    require_once("../templates/header.php"); 

    // restrict access
 //   session_start();
    if (!isset($_SESSION['user'])|| $_SESSION['admin_permission'] == 0) {
        header("location: index.php");
    }
?>

<div class="container" style="margin-top: 100px; margin-bottom: 20px; ">
    <h5>Manage Website</h5>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active pills-admin-tab" id="pills-managebooks-tab" data-toggle="pill" 
                href="#managebooks" role="tab" aria-controls="pills-managebooks"
                aria-selected="true">Books</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link pills-admin-tab" id="pills-manageusers-tab" data-toggle="pill" 
                href="#manageusers" role="tab" aria-controls="pills-manageusers"
                aria-selected="true">Users</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link pills-admin-tab" id="pills-managecustomers-tab" data-toggle="pill" 
                href="#managecustomers" role="tab" aria-controls="pills-managecustomers"
                aria-selected="true">Customers</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link pills-admin-tab" id="pills-manageorders-tab" data-toggle="pill" 
                href="#manageorders" role="tab" aria-controls="pills-manageorders"
                aria-selected="true">Orders</a>
        </li>

        <li class="nav-item" role="presentation">
            <a class="nav-link pills-admin-tab" id="pills-managefeedback-tab" data-toggle="pill" 
                href="#managefeedback" role="tab" aria-controls="pills-managefeedback"
                aria-selected="true">Feedback</a>
        </li>

    </ul>

    <div class="tab-content admin-page-tab" id="pills-tabContent">
        <div class="tab-pane fade show active" id="managebooks" 
            role="tabpanel" aria-labelledby="pills-managebooks-tab">
            <?php include("../src/AdminPage/manage_books.php") ?>
        </div>

        <div class="tab-pane fade" id="manageusers" role="tabpanel"
            aria-labelledby="pills-manageusers-tab">
            <?php include("../src/AdminPage/manage_users.php") ?>
        </div>

        <div class="tab-pane fade" id="managecustomers" role="tabpanel"
            aria-labelledby="pills-managecustomers-tab">
            <?php include("../src/AdminPage/manage_customers.php") ?>
        </div>

        <div class="tab-pane fade" id="manageorders" role="tabpanel"
            aria-labelledby="pills-manageorders-tab">
            <?php include("../src/AdminPage/manage_orders.php") ?>
        </div>

        <div class="tab-pane fade" id="managefeedback" role="tabpanel"
            aria-labelledby="pills-managefeedback-tab">
            <?php include("../src/AdminPage/manage_feedback.php") ?>
        </div>
    </div>
</div>

<script>
    var admin_btn = $("#adminpage-btn").addClass("activePage")
</script>

<?php require_once("../templates/footer.php"); ?>

<?php require_once("../templates/header.php"); ?>

<div class="container" style="margin-top: 100px; margin-bottom: 20px;">
    <div class="row">
        <div class="col-3">
            <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active mypage-tab" id="v-pills-contacts-tab" data-toggle="pill" 
                    href="#contact_details" role="tab" aria-controls="v-pills-contacts" aria-selected="true">Contacts</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link mypage-tab" id="v-pills-faq-tab" data-toggle="pill" 
                    href="#faq" role="tab" aria-controls="v-pills-profile" aria-selected="false">FAQ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link mypage-tab" id="v-pills-feedback-tab" data-toggle="pill" 
                    href="#feedback" role="tab" aria-controls="v-pills-feedback" aria-selected="false">Feedback</a>
                </li>
            </ul>
        </div>

        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active"
                    id="contact_details" role="tabpanel" aria-labelledby="v-pills-contacts-tab">
                    <?php include("../src/ContactUs/contact_details.php") ?>
                </div>

                <div class="tab-pane fade"
                    id="faq" role="tabpanel" aria-labelledby="v-pills-faq-tab">
                    <?php include("../src/ContactUs/contact_faq.php") ?>
                </div>

                <div class="tab-pane fade"
                    id="feedback" role="tabpanel" aria-labelledby="v-pills-feedback-tab">
                    <?php include("../src/ContactUs/contact_feedback.php") ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .faq-text {
    margin-top: 20px;
    margin-bottom: 40px ;
    color: var(--dark-orange);
    font-size: 16px;
    }
    #accordion .panel{
        border: none;
        box-shadow: none;
        border-radius: 25px;
        margin-bottom: 15px;
    }
    #accordion .panel-heading{
        padding: 0;
        border-radius: 20px;
    }
    #accordion .panel-title a{
        display: block;
        padding: 17px 20px 17px 70px;
        background: #F2F2F2;
        font-size: 16px;
        font-weight: 500;
        font-family: Arial, Helvetica, sans-serif;
        color: #F28705;
        border: none;
        border-radius: 30px;
        position: relative;
        transition: all 0.3s ease 0s;
    }
    #accordion .panel-title a.collapsed{ color: #242167; }
    #accordion .panel-title a:after,
    #accordion .panel-title a.collapsed:after{
        content: "\f107";
        font-family: "Font Awesome 5 Free";
        font-weight: 800;
        width: 55px;
        height: 55px;
        line-height: 55px;
        border-radius: 50%;
        background: #F28705;
        font-size: 25px;
        color: #fff;
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        transition: all 0.3s ease 0s;
    }
    #accordion .panel-title a.collapsed:after{ content: "\f105"; }
    #accordion .panel-body{
        padding: 0px 0 0 0;
        font-size: 14px;
        color: #396273;
        line-height: 25px;
        border-top: none;
        position: relative;
    }
    #accordion .panel-body p{
        padding: 10px 20px 10px;
        margin: 0;
        background: #f1f1e6;
        border-radius: 15px;
    }
</style>

<?php 
    require_once("../templates/footer.php");
?>

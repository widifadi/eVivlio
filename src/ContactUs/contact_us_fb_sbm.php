<div class="container catalog-breadcrumbs">
<a href="contact.php"> Contact Us </a> 
<i class="fas fa-chevron-right" style="color: grey;"></i>
<a href=""> Feedback </a> 
</div> 
<div class="container mt-3">
    <div class="faq-text"> <strong> Thank you for submitting your feedback! We will process it within 3 days. </strong> </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-12 pb-8">
            <form action="../public/feedback_post.php" method="POST">
                <div class="card border-primary rounded-0" style="border-color: #F2C84B !important;">
                    <div class="card-header p-0">
                        <div class="bg text-white text-center py-2" style="background: #F2C84B;">
                            <p class="m-0"><i class="fa fa-envelope"></i> Share your thoughts!</p>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user" 
                                        style="color: #F2C84B;"></i></div>
                                </div>

                                <input type="text" class="form-control" id="feedback_fname" name="feedback_fname" placeholder="Please enter your first name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user" style="color: #F2C84B;"></i></div>
                                </div>
                                <input type="text" class="form-control" id="feedback_lname" name="feedback_lname" placeholder="And your last name" required>

                                <input type="text" class="form-control" id="feedback_name" 
                                    name="feedback_name" placeholder="Please enter your name" required>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope" 
                                        style="color: #F2C84B;"></i></div>
                                </div>
                                <input type="email" class="form-control" id="feedback_email" 
                                    name="feedback_email" placeholder="What email can we use to reach you?" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-comment" 
                                        style="color: #F2C84B;"></i></div>
                                </div>

                                <textarea class="form-control" rows="5" id="feedback_text" name="feedback_text" placeholder="Leave your feedback here" required></textarea>

                                <textarea class="form-control" rows="5" id="feedback_text" name="feedback_message" placeholder="Leave your feedback here" required></textarea>


                                <textarea class="form-control" rows="5" id="feedback_text" 
                                    name="feedback_message" placeholder="Leave your feedback here" required></textarea>

                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" id="btn_feedback" name="btn_feedback" 
                                value="Send" class="btn  btn-block rounded-0 py-2" style="background: #F2C84B; color:white;">
                        </div>
                    </div>

                </div>
            </form>
            


        </div>
    </div>
</div>




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
                    <div class="container catalog-breadcrumbs">
                        <a href="my_page.php"> My Page </a> 
                        <i class="fas fa-chevron-right" style="color: grey;"></i>
                        <a href=""> Personal Details </a> 
                    </div>     
                    <!---DETAILS TABS---->
                    <ul class="nav nav-tabs" id="myPageTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active mypage-tab" id="preview-tab" 
                             data-toggle="tab" href="#preview" role="tab" 
                            aria-controls="preview" aria-selected="true">Preview</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link mypage-tab" id="edits-tab" 
                            data-toggle="tab" href="#edit" role="tab" 
                            aria-controls="edit" aria-selected="false">Edit</a>
                        </li>
                    </ul>
                    <!--- DETAILS TABS CONTENT---->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="preview" role="tabpanel" 
                            aria-labelledby="preview-tab" style="font-size: 14px; padding: 10px;">
                            <!-- PHP database connection -->
                            <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "root";
                                $dbname = "eVivlio";

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // TODO get username from session
                                $user_name = $_SESSION['user'];
                                
                                // TODO select customer table WHERE username = username

                            ?>
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h6 class="mb">Full Name</h6>
                                </div>
                                <div class="col-8 text-secondary">
                                    <?php 
                                        echo "hello"
                                        // TODO echo $query_result['first_name']
                                    ?>
                                        Someone
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-3">
                                    <h6 class="mb">Username</h6>
                                </div>
                                <div class="col-8 text-secondary">
                                    someone_cool
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb">E-mail</h6>
                                </div>
                                <div class="col-8 text-secondary">
                                    someone_cool@gmail.com
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb">Date of birth</h6>
                                </div>
                                <div class="col-8 text-secondary">
                                    22/04/1998
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb">Contact Number</h6>
                                </div>
                                <div class="col-8 text-secondary">
                                +3000000000
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="edit" role="tabpanel" 
                                 aria-labelledby="edit-tab" style="padding: 10px;">
                            <div class="row">
                                <div class="col">
                                    
                                        <div class="d-flex justify-content-between align-items-center mb-3">

                                        </div>
                                        <div class="row">
                                            <div class="col"><label class="labels">Fisrt Name</label><input type="text" class="form-control" placeholder="First name" value=""></div>
                                            <div class="col"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Last name"></div>
                                        </div>
                                        <div class="row">
                                        <div class="col"><label class="labels">Username</label><input type="text" class="form-control" placeholder="Username" value=""></div>
                                            <div class="col"><label class="labels">E-mail</label><input type="text" class="form-control" placeholder="E-mail" value=""></div>
                                            <div class="col"><label class="labels">Date of birth</label><input type="text" class="form-control" placeholder="Date of birth" value=""></div>
                                            <div class="col"><label class="labels">Contact Number</label><input type="text" class="form-control" placeholder="Contact number" value=""></div>
                                            
                                        </div>
                                    
                                        <div class="mt-5 text-center"><button class="btn  btn-outline-warning" type="button">Save</button></div>
                                
                                </div>
        
                            </div> 
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" style="margin-left:100px" id="v-pills-wishlist" role="tabpanel" aria-labelledby="v-pills-wishlist-tab">
                    <div class="container catalog-breadcrumbs">
                        <a href="my_page.php"> My Page </a> 
                        <i class="fas fa-chevron-right" style="color: grey;"></i>
                        <a href=""> My Wishlist </a> 
                    </div> 
                    <div class="col "> 
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <div class="row mt-3 ml-3">
                                    <div id="book-title"> <a href="#" class="text-dark">"Title", Author (Year)</a></div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <div class="row mt-3 ml-3">
                                    <div id="book-title"> <a href="#" class="text-dark">"Title", Author (Year)</a></div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <div class="row mt-3 ml-3">
                                    <div id="book-title"> <a href="#" class="text-dark">"Title", Author (Year)</a></div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <div class="row mt-3 ml-3">
                                    <div id="book-title"> <a href="#" class="text-dark">"Title", Author (Year)</a></div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <div class="row mt-3 ml-3">
                                    <div id="book-title"> <a href="#" class="text-dark">"Title", Author (Year)</a></div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <div class="row mt-3 ml-3">
                                    <div id="book-title"> <a href="#" class="text-dark">"Title", Author (Year)</a></div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <div class="row mt-3 ml-3">
                                    <div id="book-title"> <a href="#" class="text-dark">"Title", Author (Year)</a></div>
                                </div>
                                <div class="row mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="#" class="text-dark ml-5"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" style="margin-left:100px" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
                    <div class="container catalog-breadcrumbs">
                        <a href="my_page.php"> My Page </a> 
                        <i class="fas fa-chevron-right" style="color: grey;"></i>
                        <a href=""> Order History </a> 

                    </div> 
                    <div class="col "> 
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <br>
                                <div id="book-title">"Title", Author (Year)</div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <br>
                                <div id="book-title">"Title", Author (Year)</div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <br>
                                <div id="book-title">"Title", Author (Year)</div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <br>
                                <div id="book-title">"Title", Author (Year)</div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <br>
                                <div id="book-title">"Title", Author (Year)</div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <br>
                                <div id="book-title">"Title", Author (Year)</div>
                            </div>
                        </div>
                        <div class="row wl-book">
                            <div class="col-2">
                                <img src="../assets/img/open-book.png" alt="book" width="100px" id="book-cover">
                            </div>
                            <div class="col-4">
                                <br>
                                <div id="book-title">"Title", Author (Year)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container" style="margin-top: 100px; margin-bottom: 20px; margin-left: 10px;">

    <div class="row">

        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active mypage-tab" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Details</a>
                <a class="nav-link mypage-tab" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">My Wishlist</a>
                <a class="nav-link mypage-tab" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Order History</a>
            </div>
        </div>

        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" style="margin-left:100px" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
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
                            <div class="row mt-3">
                                <div class="col-3">
                                    <h6 class="mb">Full Name</h6>
                                </div>
                                <div class="col-8 text-secondary">
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



                <div class="tab-pane fade" style="margin-left:100px" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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


                <div class="tab-pane fade" style="margin-left:100px" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
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


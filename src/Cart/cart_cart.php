<?php
    //session_start();
    require_once ('../database/database_functions.php');
    db_connection();
?>

<div class="container" style="margin-top:100px; margin-left: 10px;">

    <!-- Order Summary Section -->
    <div class="row">
        <div class="col-4" style="">
            <div class="row">
                <div class="col">
                <div class="bg-light rounded-pill px-4 py-3 font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted" id="cart-number">Number of positions </strong><strong>5</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted" id="cart-total">Total</strong>
                            <h5 class="font-weight-bold">$$</h5>
                        </li>
                        </ul><a href="#" class="btn btn-warning rounded-pill py-2 btn-block">Procceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Cart Section -->
        <div class="col-8">
            <div class="container catalog-breadcrumbs">
                <a href="my_page.php"> My Cart </a> 
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table" >
                        <tbody >
                                <?php
                                    // Fetching information from cart table 
                                    require_once '../database/database_functions.php';
                                    $conn = db_connection();
                                    $stmt = $conn->prepare("SELECT * FROM cart");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $grand_total = 0;
                                    while ($row = $result->fetch_assoc()):
                                ?>
                            <tr >
                            <th scope="row" class="border-0" >
                                <div class="p-2">
                                <img src="<?= $row['book_cover'] ?>" alt="book" width="100px" id="book-cover">
                                <div class="ml-3 d-inline-block align-middle">
                                    <a href="#" class="text-dark"><div class="book-title" id="book-title">"<?= $row['book_title'] ?>", <?= $row['author_first_name'], $row['author_last_name'] ?> (<?= $row['publishing_year'] ?>)</div></a>
                                </div>
                                </div>
                            </th>
                            <td class="border-0 align-middle book-price" style="background:white;" id="book-price"><strong><i class="fas fa-euro-sign"></i>&nbsp;<?= $row['price'] ?></strong></td>
                            <td class="border-0 align-middle book-price" style="background:white;" id="book-quantity"><strong><?= $row['quantity'] ?></strong></td>
                            <td class="border-0 align-middle book-price" style="background:white;"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                            <td class="border-0 align-middle book-price" style="background:white;"><a href="#" class="text-dark"><i class="fa fa-heart"></i></a></td>
                            </tr>
                                <?php endwhile; ?>
                            
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- Ajax Code for cart -->
    <script type="text/javascript">
        $(document).ready(function(){

            $(".itemQty").on('change',function(){
                var $el = $(this).closest('tr');

                var pid = $el.find(".pid").val();
                var pprice = $el.find(".pprice").val();
                var qty = $el.find(".itemQty").val();
                console.log(qty);
                location.reload(true);

                $.ajax({
                    url: 'cart_action.php',
                    method: 'post',
                    cache: false,
                    data: {qty:qty, pid:pid, pprice:pprice},
                    success: function(response){
                        console.log(response);
                    }
                })
            });
        });
    </script>
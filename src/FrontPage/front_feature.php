
<?php require_once("../src/Feature/Book_Feature.php"); ?>

<div class="container features-div">

    <!--------------------------------------BestSeller--------------------------------->
<?php   list($featureBook_id,$featureBookCover,$featureBookTitle) =feature("Best Sellers"); ?>
<h1>Best Sellers</h1>

    <div class="feature-div">

       <div id="best-sellers" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
        <!-----------------------PHP---------------------------------------------->
             <?php
                    $i=0; 
                    $j=3; 
             for($x=0;$x<=count($featureBookCover);$x+=4){
                 if($x<=3){
               echo '<div class="carousel-item  active">';
                       }
               else{ 
                    echo '<div class="carousel-item ">';
                }
                 ?>
                   <div class="row">
       <!-----------------------PHP---------------------------------------------->
                <?php for($i;$i<=$j;$i++){ ?>
                      <div class="col-sm-3">
                       <a href="book_details.php?bookid=<?php echo $featureBookTitle[$i];?>">
                           <img src="../assets/img/book-covers/<?php echo $featureBookCover[$i];?>" 
                           alt="<?php echo $featureBookTitle[$i];?>" width=100px hight=50px >
                       </a>
                         </div>
                         <?php }
                        $i+=4;
                        $j+=4;
                        } ?>
        <!-----------------------PHP END---------------------------------------------->
                       </div>
                    </div>
                </div>
             </div>
  
                     <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#best-sellers" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#best-sellers" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<!--
    <div id="new-release" class="feature-div">
        <span class="subtitle">New Release</span>
    </div>
    <div id="editors-pick" class="feature-div">
        <span class="subtitle">Editor's Pick</span>
    </div>
-->
</div>
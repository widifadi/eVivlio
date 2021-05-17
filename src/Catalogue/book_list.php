<?php require_once("../database/functions/database/database_functions.php"); ?> 
<!-- display book catalogue-->
<?php 
$category = $_GET["p"];
if( $category==="all_books") {
   require_once("../src/Catalogue/all_books.php");
	}
else{
   require_once("../src/Catalogue/specific_books.php");
}

?>




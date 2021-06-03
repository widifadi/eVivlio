<?php
$to = $customerEmail;
$subject = "eVivlio- Receipt";
$txt ="
<html>
<head>
<title>Evivlio</title>
</head>
<body>
<p>Receipt</p>

<table>
<tr style="."padding-bottom: 5em".">
<th>Name</th>
<th style="."text-align: center;padding-right: 4em;"."> Order Number </th>
<th style="."text-align: center; padding-right: 4em;".">Date Date </th>
</tr>
    <tr style="."padding-bottom: 3em".">
    <td >".$CustomerName. "</td>
    <td style="."text-align: center".">".$orderID. "</td>
    <td style="."text-align: center".">".$Date."</td>
    </tr>
<tr style="."padding-bottom: 2em".">
<th>Book Title</th>
<th style="."text-align: center".">Quantity</th>
<th style="."text-align: center"."> Price</th>".
 /*</tr>

    <?php for($p=0; $p<count($qtys); $p++){?>
<tr style="."padding-bottom: 2em".">
    <td><?php echo $bookTitles[$p];?></td>
    <td style="."text-align: center"."><?php echo $qtys[$p];?></td>
    <td style="."text-align: center"."><?php echo$prices[$p];?></td>
    
</tr>
    <?php
    
$totalSUM+=$prices[$p];

}?>
<tr style="."padding-bottom: 10em".">
<td><th>Total Price</th> </td><td style="."text-align: center"."><?php echo $totalSUM?> </tr>*/

"</table>

</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to,$subject,$txt,$headers);

?>
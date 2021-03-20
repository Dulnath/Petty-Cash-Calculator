<?php
$conn = mysqli_connect('localhost','root','','pettycash');
        
if(!$conn){
    die("Sorry, Failed to connect; ".mysqli_connect_error());
}else{
    echo("Connection established <br>");
}

$sql = "SELECT trans_desc,trans_type,trans_amt FROM petty_cash_book;";

$retrieve = mysqli_query($conn,$sql);

if(!$retrieve){
    die("Could not retrieve data<br>".mysqli_connect_error());
}
echo "<table><th>trans_desc</th>    <th>trans_cat</th>   <th>trans_amt</th><tbody>";
while($row = mysqli_fetch_array($retrieve, MYSQLI_ASSOC)){
    echo "<tr><td>{$row['trans_desc']}</td>  <td>{$row['trans_type']}</td>    <td>{$row['trans_amt']}</td></tr>";
}
echo "</tbody></table>"
?>
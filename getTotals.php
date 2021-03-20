<html lang="en">
<head>
    <title>Get Totals</title>
</head>
<body>
    <?php
        //replace the variable values with input form names
        //or do whatever you have to to insert the form inputs into these 3 variables
        $desc = 'description';
        $cat = 'Other';
        $amt = 100;

        $conn = mysqli_connect('localhost','root','','pettycash');
        
        if(!$conn){
            die("Sorry, Failed to connect; ".mysqli_connect_error());
        }else{
            echo("Connection established <br>");
        }

        $insert = "INSERT INTO petty_cash_book(trans_desc,trans_type,trans_amt)
                   VALUES('$desc','$cat',$amt);";

        $result = mysqli_query($conn,$insert);

        if($result){
            echo "The records were inserted succesfully<br>";
        }else{
            echo "Failed to insert records <br>".mysqli_error($conn);
        }

        $stat_total = 0;
        $trav_total = 0;
        $maint_tot = 0;
        $other_tot = 0;
        $total = 0;

        $sql = "SELECT trans_type,trans_amt FROM petty_cash_book;";
        
        $retrieve = mysqli_query($conn,$sql);

        if(!$retrieve){
            die("Could not retrieve data<br>".mysqli_connect_error());
        }

        while($row = mysqli_fetch_array($retrieve, MYSQLI_ASSOC)){
            $total+=$row['trans_amt'];
            if($row['trans_type'] == 'stationary'){
                $stat_total+=$row['trans_amt'];
            }else if($row['trans_type'] == 'travel'){
                $trav_total+=$row['trans_amt'];
            }else if($row['trans_type'] == 'maintainance'){
                $maint_tot+=$row['trans_amt'];
            }else{
                $other_tot+=$row['trans_amt'];
            }
        }
        
        echo "stationary expenses = ".$stat_total."<br>";
        echo "travel expenses = ".$trav_total."<br>";
        echo "maintainance expenses = ".$maint_tot."<br>";
        echo "other expenses = ".$other_tot."<br>";
        echo "Total expenses = ".$total;

    ?>
</body>
</html>
<html lang="en">
<head>
    <title>Petty Cash</title>
</head>
<body>
    <?php
        //Run this code to empty the table
        $host = 'localhost';
        $root = 'root';
        $password = '';
        $database = 'pettyCash';

        $conn = mysqli_connect($host,$root,$password,$database);

        if(!$conn){
            die("Sorry, Failed to connect; ".mysqli_connect_error());
        }else{
            echo("Connection established <br>");
        }

        $delete = "DELETE FROM petty_cash_book WHERE trans_amt != 0;";

        $result = mysqli_query($conn,$delete);

        if($result){
            echo "Table Emptied succesfully<br>";
        }else{
            echo "Failed to Empty table \n".mysqli_error($conn);
        }

    ?>
</body>
</html>
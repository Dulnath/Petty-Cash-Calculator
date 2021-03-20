<html lang="en">
<head>
    <title>Petty Cash</title>
</head>
<body>
    <?php

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

        //run this chunk to create table
        /*
        $pettyCash = "CREATE TABLE petty_cash_book(
                        trans_id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        trans_desc varchar(255) NOT NULL,
                        trans_type varchar(20) NOT NULL default 'other',
                        trans_amt int(11) NOT NULL default 0
                      );";

        $result = mysqli_query($conn,$pettyCash);

        if($result){
            echo "Table created succesfully<br>";
        }else{
            echo "Failed to create table \n".mysqli_error($conn);
        }
        */

        //run this chunk to insert a bunch of test values

        
        $insert = "INSERT INTO petty_cash_book(trans_desc,trans_type,trans_amt)
                   VALUES('pens','stationary',200),('taxi fare','travel',400),
                    ('printing paper','stationary',200),('beverages','other',300),
                    ('cleaning','maintainance',400);";

        $result = mysqli_query($conn,$insert);

        if($result){
            echo "The records were inserted succesfully<br>";
        }else{
            echo "Failed to insert records <br>".mysqli_error($conn);
        }
        

    ?>
</body>
</html>
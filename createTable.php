<html>
    <body>
        <?php
        $conn = mysqli_connect('localhost','root','','test');
        if(!$conn){
            die("Oops! Failed to connect".mysqli_connect_error());
        }else{
            echo "Successfully connected!";
        }
        
        $movie = "DROP TABLE IF EXISTS movie;
                  CREATE TABLE movie(
                    movie_id int(11) NOT NULL auto_increment,
                    movie_name varchar(255) NOT NULL,
                    lead_actor varchar(255) NOT NULL,
                    PRIMARY KEY (movie_id)
                  )";
        $result = mysqli_query($conn,$movie);

        if($result){
            echo "Table successfully created!";
        }else{
            echo "Failed to create tables because <br>".mysqli_error($conn);
        }

        ?>
    </body>
</html>
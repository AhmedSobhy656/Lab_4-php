
<?php
   
   echo " Lab 4 - 2";
?>

<!-- #1 ----  open & close connection-------------------------------------------------->
<!-- <?php

   echo " # 1 open & close connection <br>";
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'lab4';
   $link = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);

   if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }
  echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
  echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
  mysqli_close($link);
?> -->
 
<!-- #2 ----  create db TABLE ------------------------------------------>
<!-- <?php
  echo "<br> # create db TABLE <br>";

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='lab4';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
    if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
    }
   echo 'Connected successfully<br>';
   //select
   mysqli_select_db( $conn,$dbname );

   //create table
  $sql = 'CREATE TABLE userData( 
   user_id     INT NOT NULL AUTO_INCREMENT,
   user_name   VARCHAR(20) NOT NULL,
   user_email  VARCHAR(50) NOT NULL,
   user_gender VARCHAR(20) NOT NULL,
   mail_status VARCHAR(20) NOT NULL,
   primary key ( user_id ))';

  echo "<br>Database Table  created successfully\n";



   mysqli_close($conn);
?> -->

 <!-- #3 ---- insert data -------- ----------------------------------------->
<?php
 echo "<br> # get data from to TABLE  and display  <br>";

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='lab4';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   echo 'Connected successfully<br>';
   //select
   mysqli_select_db( $conn,$dbname );
    //insert data 
      //    //insert Data to table 
      $user1 = "INSERT INTO userData(
               user_name,user_email, user_gender, mail_status) 
               VALUES ( 
               'User 1', 'uservisor@iti.com', 'M', 'Yes' )";

      $user2 = "INSERT INTO userData(
               user_name,user_email, user_gender, mail_status) 
               VALUES ( 
               'User 2', 'admin@iti.com', 'M', 'Yes' )";

       $user3 = "INSERT INTO userData(
               user_name,user_email, user_gender, mail_status) 
               VALUES ( 
               'User 3', 'test@iti.com', 'F', 'No' )";
               
        $user4 = "INSERT INTO userData(
               user_name,user_email, user_gender, mail_status) 
               VALUES ( 
               'User 4', 'ahmed.sobhy753@gmail.com', 'M', 'No' )";
       
       $user5 = "INSERT INTO userData(
               user_name,user_email, user_gender, mail_status) 
               VALUES ( 
               'User 5', 'Aya@gmail.com', 'F', 'No' )";
               

  // insert Data to Table from file 
    //   $query_file = 'insert_Data.txt';
    //   $fp = fopen($query_file, 'r');
    //   $sql = fread($fp, filesize($query_file));
    //   fclose($fp);

     $retval = mysqli_query( $conn,$user1 );
     $retval = mysqli_query( $conn,$user2 );
     $retval = mysqli_query( $conn,$user3 );
     $retval = mysqli_query( $conn,$user4 );
     $retval = mysqli_query( $conn,$user5 );
   
    if(! $retval ) {
      die('Could not create table: ' . mysqli_error($conn));
    }
      echo "<br>Data inserted to table successfully\n";
      mysqli_close($conn);
?>
 
 

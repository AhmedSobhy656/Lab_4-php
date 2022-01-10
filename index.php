
<!DOCTYPE html>
 <html>
       <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="css/fontawesome-free-5.15.4-web/css/all.css">
         <link rel="stylesheet" href="css/bootstrap-grid.min.css"> 
         <link rel="stylesheet" href="css/bootstrap.min.css"> 
         <link rel="stylesheet" href="css/main.css">
       </head>

       <style>
          .table{
             width:60%;
             border:1px solid ;
             margin-left:20%;
             margin-top:5%;
          }
          .title{
             /* float:left; */
            margin-top : 3%; 
            margin-left :20%;
          }
          .btn-addNewuser{
            float :right;
            margin-right : 20%;
            margin-top : 1%;
          }
          .btn-addNewuser a{
            text-decoration: none;
            color : white;
          }

          /* font awesom icno */
          .icon{ 
             color : blue;
          }

       </style>

       <body>
       
         <h2 class='title'> User Details </h2>
         <button type="button" class="btn btn-success btn-addNewuser"> <a href="form.php"> Add New User</a> </button>
           

<?php

  //select==get data from to TABLE
   // echo " # 1 open & close connection <br>";
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'lab4';

   //step 1
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
    die('Could not connect: ' . mysqli_error($conn));
   }
   // echo 'Connected successfully <br>';
   
   //step 2
    // get data from to TABLE
   $sql = 'SELECT user_id, user_name, user_email, user_gender, mail_status   FROM userData';
   mysqli_select_db($conn,$dbname);
   $result = mysqli_query($conn,$sql );
   
   if(! $result ) {
      die('Could not get data: ' . mysqli_error($conn));
   }
    
   //step 3  : display data 
   if (mysqli_num_rows($result) > 0) {
      // output data of each row

        // echo "<table>";
           echo " 
           <table class='table'> 
           <thead>
              <tr> 
                 <th scope='col'>ID</th> 
                 <th scope='col'>Name</th> 
                 <th scope='col'>Email</th> 
                 <th scope='col'>Gender</th> 
                 <th scope='col'>Mail Status</th> 
                 <th scope='col'> Action     </th> 

                </tr>
          </thead>
              ";
           
      while($row = mysqli_fetch_assoc($result)) {

         echo " <tbody>      
         <tr> 
            <td>  {$row['user_id']}     </td>     ".
         "  <td>  {$row['user_name']}   </td>     ".
         "  <td>  {$row['user_email']}  </td>     ".
         "  <td>  {$row['user_gender']} </td>    ".
         "  <td>  {$row['mail_status']} </td> ".
         "  <td>  <i class='fas fa-eye icon'>        </i>  
                  <i class='fas fa-pencil-alt icon'> </i> 
                  <i class='far fa-trash-alt icon'>  </i>
         </td> </tr>   </tbody>  " ;
        
      }
          echo "</table>"; 

       } else {
           echo "0 results";
    }
   
      mysqli_close($conn);
?>

       </body> 
       
</html>  




  
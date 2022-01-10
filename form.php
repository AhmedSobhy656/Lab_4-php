
      
<?php
       
       // define variables and set to empty values
          $nameErr = $emailErr = $genderErr = $agreeErr = "";
          $name = $email = $gender = $agree = "";
     
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
             
               if (empty($_POST["name"])) {
                   $nameErr = "Name is required";  // bonus
                   } else {
                      $name = $_POST['name'];
                   }
                
               if (empty($_POST["email"])) {
                   $emailErr = "E-mail is required";
                     } else {
                        $email = $_POST['email'];
                     }
                     
                if (empty($_POST["gender"])) {
                     $genderErr = "Gender is required";
                         } else {
                            $gender = $_POST['gender'];
                         }
     
                if (empty($_POST["agree"])) {
                     $agreeErr = "Agree is required";
                         } else {
                                $agree = $_POST['agree'];
                             }
     
       
     }
     ?>
     
        <!--****************************** HTML************************** -->
 
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
           form{
               width:50%;
               margin-left:25%;
               margin-top :5%;
           }

      </style>
      
      <body>
         <form action = "<?php $_PHP_SELF ?>" method = "POST">
              <div class="form-group">
                 <label >Name</label>
                 <input type="text" class="form-control" name = "name"  placeholder="Enter Name">
                 <span>*  <?php echo $nameErr;?> </span>
               </div>      
               <br>
              <div class="form-group">
                 <label for="exampleInputEmail1">Email</label>
                 <input type="email" class="form-control" name = "email" placeholder="Enter email">
                 <span>*  <?php echo $emailErr;?> </span>
              </div>
              <br>

              <h6> Gender </h6>
              <div class="form-check">  
                 <input class="form-check-input" type="radio" value="male" name = "gender">
                 <label class="form-check-label" > Male </label>
                 <br> <br>
                 <input class="form-check-input" type="radio" value="female" name = "gender">
                 <label class="form-check-label" > Female </label>
                 <span>*  <?php echo $genderErr;?> </span>
               </div>

              <br>
              <div class="form-group form-check">
                 <input type="checkbox" class="form-check-input" name="agree">
                 <label class="form-check-label"> Recieve E-mail from us </label>
                 <span>*  <?php echo $agreeErr;?> </span>
              </div>
              <br>
              <button type="submit" class="btn btn-primary"> Submit</button>
           </form>

      </body>

   </html>


   <!---------------------------------PHP Print ---------------------------------- -->

<?php
   
   echo "Name           :    $name ";   
   echo "<br>";
   echo "Email          :    $email ";   
   echo "<br>";
   echo "Gender         :    $gender ";   
   echo "<br>";  
  
      /************************************************** */ 

       /* #3 ---- insert data -------- ----------------------------------------*/
       // use validation function isset() to avoid store data empty when user refresh page without Entry data
if ( (isset($_POST["name"])) && (isset($_POST["email"])) && (isset($_POST["gender"])) && (isset($_POST["agree"])) ) {


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
  // newUser is take the values come from regesteration form (name,email,gender)
     
    echo "Variable 'a' is set.<br>";

    $newUser = "INSERT INTO userData(  
      user_name,user_email, user_gender, mail_status) 
      VALUES ( 
          '$name', '$email', '$gender', '$agree' )";
            $retval = mysqli_query( $conn,$newUser );



if(! $retval ) {
die('Could not create table: ' . mysqli_error($conn));
}
echo "<br>Data inserted to table successfully\n";

mysqli_close($conn);

  } else{
      echo " print else <br>";
 
}

      
?>


 
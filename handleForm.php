<?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $date = test_input($_POST["date"]);
         $happiness = test_input($_POST["happiness"]);
         $willpower = test_input($_POST["willpower"]);
         $exercise = test_input($_POST["exercise"]);
         $meditation = test_input($_POST["meditation"]);
         $herb = test_input($_POST["herb"]);       
         
         $dbhost = 'localhost:3306';
         $dbuser = 'root';
         //$dbpass = 'guest123';
         $conn = mysqli_connect($dbhost, $dbuser,'','life');
         

         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }

         $sql = "INSERT INTO daily ( date, happiness, willpower, exercise, meditation, herb) 
               VALUES ( DATE('$date'), '$happiness', '$willpower', '$exercise', '$meditation', '$herb')
               ON DUPLICATE KEY UPDATE
               happiness = '$happiness',
               willpower = '$willpower',
               exercise = '$exercise',
               meditation = '$meditation',
               herb = '$herb';";
         
         // sample values for testing
         // $sql = "INSERT INTO daily ( date, happiness, willpower, exercise, meditation, herb) 
         //       VALUES ( DATE('$date'), '3', '4', '5', '6', '7');";
            
         $retval = mysqli_query( $conn, $sql );
            
         if (!$retval) {
            die("Errormessage: %s\n". mysqli_error($conn));
         }
    
         echo "Entered data successfully\n";

         mysqli_close($conn);
      }

      function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
      ?>
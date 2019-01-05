<?php 
   $dbhost = '127.0.0.1:3306';
   $dbuser = 'root';
   
   // get current date to use in setting default calendar view
   function getDatetimeNow() {
      $tz_object = new DateTimeZone('Asia/Bangkok');
      //date_default_timezone_set('Asia/Bangkok');

      $datetime = new DateTime();
      $datetime->setTimezone($tz_object);
      
      return $datetime->format('Y\-m\-d');
   }

//https://stackoverflow.com/a/45706233 
// 1. display page with current day values
// 2. on change of 'date' the form is submitted
// 3. the form submission page serves html again, but with new date value and associated fields pre-filled out
// 4. submission from the bottom button updates sql row
// OR just always start by getting date value (differentiate between auto current date and when a different one has been selected)
//    then fill out form with according data. submit updates anything you change. this means it always starts pre-populated

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $date = test_input($_POST["date"]);
      $happiness = test_input($_POST["happiness"]);
      $willpower = test_input($_POST["willpower"]);
      $exercise = test_input($_POST["exercise"]);
      $meditation = test_input($_POST["meditation"]);
      $tiredness = test_input($_POST["tiredness"]);
      $slept = test_input($_POST["slept"]);
      $herb = test_input($_POST["herb"]);
      $caffeine = test_input($_POST["caffeine"]);
      $protein = test_input($_POST["protein"]);
      $creatine = test_input($_POST["creatine"]);
      $alcohol = test_input($_POST["alcohol"]);
      $bigo = test_input($_POST["bigo"]);       
      
      //$dbpass = 'guest123';
      $conn = mysqli_connect($dbhost, $dbuser,'','life');

      //if you couldn't connect to the database...
      if(! $conn ) {
         die('Could not connect: ' . mysqli_error());
      }

      $retval = mysqli_query( $conn, $sql );
         
      //if no value is returned...
      if (!$retval) {
         die("Errormessage: %s\n". mysqli_error($conn));
      }

      echo "Entered data successfully\n";

      mysqli_close($conn);
   
   } else {

      //connect to database and try to get row for today's date, return errors if encountered
      $conn = mysqli_connect($dbhost, $dbuser,'','life');
         if(! $conn ) { die('Could not connect: ' . mysqli_error()); }
      $sql = "SELECT * FROM daily WHERE date='".getDatetimeNow()."'";
      $retval = mysqli_query( $conn, $sql );
         if (! $retval ) { die("Errormessage: %s\n". mysqli_error($conn)); }
      $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
      
      //
      if ($row["date"] == NULL) {
         echo "date is null";
      } else {
         $date = $row["date"];
         $happiness = $row["happiness"];
         $willpower = $row["willpower"];
         $exercise = $row["exercise"];
         $meditation = $row["meditation"];
         $tiredness = $row["tiredness"];
         $slept = $row["slept"];
         $herb = $row["herb"];
         $caffeine = $row["caffeine"];
         $protein = $row["protein"];
         $creatine = $row["creatine"];
         $alcohol = $row["alcohol"];
         $bigo = $row["bigo"];
      }
         
      echo "row at date is ".$row["date"];
     

      mysqli_close($conn); 
   
      include 'mainpagehtml.php';
   }
?>
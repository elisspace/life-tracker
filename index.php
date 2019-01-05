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
      $herb = test_input($_POST["herb"]);       
      
      
      //$dbpass = 'guest123';
      $conn = mysqli_connect($dbhost, $dbuser,'','life');
      

      if(! $conn ) {
         die('Could not connect: ' . mysqli_error());
      }

      // $sql = "INSERT INTO daily ( date, happiness, willpower, exercise, meditation, herb) 
      //       VALUES ( DATE('$date'), '$happiness', '$willpower', '$exercise', '$meditation', '$herb')
      //       ON DUPLICATE KEY UPDATE
      //       happiness = '$happiness',
      //       willpower = '$willpower',
      //       exercise = '$exercise',
      //       meditation = '$meditation',
      //       herb = '$herb';";
      
      // sample values for testing
      // $sql = "INSERT INTO daily ( date, happiness, willpower, exercise, meditation, herb) 
      //       VALUES ( DATE('$date'), '3', '4', '5', '6', '7');";
         
      $retval = mysqli_query( $conn, $sql );
         
      if (!$retval) {
         die("Errormessage: %s\n". mysqli_error($conn));
      }

      echo "Entered data successfully\n";

      mysqli_close($conn);
   
   } else {

      $conn = mysqli_connect($dbhost, $dbuser,'','life');
      if(! $conn ) { die('Could not connect: ' . mysqli_error()); }

      $sql = "SELECT * FROM daily WHERE date='".getDatetimeNow()."'";
               
      $retval = mysqli_query( $conn, $sql );
      if (!$retval) {
         die("Errormessage: %s\n". mysqli_error($conn));
      }
      
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
         $herb = $row["herb"];
      }
         
      

      
      echo "row at date is ".$row["date"];
     

      mysqli_close($conn); 
   
?>

<html>
   
   <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <title>Life Tracker</title>
     
   </head>
   
   <body>
      
      <div class="container">
      <h1>Life Tracker</h1>
      <form method="post" action="handleForm.php">  
         
         <!-- date -->
         <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date"
               value="<?php echo getDatetimeNow() ?>" onchange="this.form.submit()",
               min="2018-01-01" max="2019-12-31">
         </div>
         
         <!-- happiness -->
         <div class="form-group">
            <label for="happiness">Happiness:</label>
            <input type="text" list="happiness" />
            <datalist id="happiness">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3" selected>3</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </datalist>
         </div>

         <!-- willpower -->
         <div class="form-group pb-0">
            <label for="willpower">willpower:</label>
            <input type="text" list="willpower" />
            <datalist id="willpower">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3" selected>3</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </datalist>
          </div>
         
         <!-- exercise -->
         <div class="form-group">
            <label for="exercise">exercise:</label>
            <input type="text" id="exercise" name="exercise" class="form-control" placeholder="# of minutes">
         </div>

         <!-- meditation -->
         <div class="form-group">
            <label for="meditation">meditation:</label>
            <input type="text" id="meditation" name="meditation" class="form-control" placeholder="# of minutes">
         </div>

         <!-- tiredness -->
         <div class="form-group pb-0">
            <label for="tiredness">tiredness:</label>
            <input type="text" list="tiredness" />
            <datalist id="tiredness">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3" selected>3</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </datalist>
          </div>

         <!-- slept -->
         <div class="form-group">
            <label for="slept">slept:</label>
            <input type="text" id="slept" name="slept" class="form-control" placeholder="# of hours">
         </div>

         <!-- caffeine -->
         <div class="form-group">
            <label for="caffeine">caffeine:</label>
            <input type="text" id="caffeine" name="caffeine" class="form-control" placeholder="# of espresso shots">
         </div>         

         <!-- herb -->
         <div class="form-group">
            <label for="herb">herb:</label>
            <input type="text" id="herb" name="herb" class="form-control" placeholder="# of bowls">
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>  
      </form>
      
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
   </body>
</html>

<?php
         }
      ?>
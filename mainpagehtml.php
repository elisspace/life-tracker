<html>
   
   <head>
      <meta charset="UTF-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <title>Life Tracker</title>
   </head>
   
   <body>
      
      <div class="container">
         <div class="row justify-content-center">
            <h1>Life Tracker</h1>
         </div>
      
      <!-- Begin form -->
      <form method="post" action="handleForm.php">  
         
         <!-- date -->
         <div class="row justify-content-center form-group">
            <label for="date">📅</label>
            <input type="date" id="date" name="date"
               value="<?php echo getDatetimeNow() ?>" onchange="this.form.submit()",
               min="2018-01-01" max="2019-12-31">
         </div>
         
         <div class="row">
            <!-- happiness -->
            <div class="form-group col-4">
               <label for="happiness">Happiness:</label>
               <input type="text" list="happiness" name="happiness"/>
               <datalist id="happiness">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
               </datalist>
            </div>
   
            <!-- willpower -->
            <div class="form-group pb-0 col-4">
               <label for="willpower">Willpower:</label>
               <input type="text" list="willpower" name="willpower"/>
               <datalist id="willpower">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
               </datalist>
             </div>
   
             <!-- tiredness -->
            <div class="form-group pb-0 col-4">
               <label for="tiredness">Tiredness:</label>
               <input type="text" list="tiredness" name="tiredness"/>
               <datalist id="tiredness">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
               </datalist>
             </div>
         </div>

          <!-- slept -->
         <div class="form-group">
            <label for="slept">slept:</label>
            <input type="text" id="slept" name="slept" class="form-control" placeholder="# of hours">
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

         <!-- protein -->
         <div class="form-group">
            <label for="protein">herb:</label>
            <input type="text" id="protein" name="protein" class="form-control" placeholder="# of grams">
         </div>

         <!-- creatine -->
         <div class="form-group">
            <label for="creatine">creatine:</label>
            <input type="text" id="creatine" name="creatine" class="form-control" placeholder="# of grams(?)">
         </div>

         <!-- alcohol -->
         <div class="form-group">
            <label for="alcohol">alcohol:</label>
            <input type="text" id="alcohol" name="alcohol" class="form-control" placeholder="# of standard drinks">
         </div>

         <!-- bigo -->
         <div class="form-group">
            <label for="bigo">bigo:</label>
            <input type="text" id="bigo" name="bigo" class="form-control" placeholder="# of 💦">
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>  
      </form>
      
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
   </body>
</html>
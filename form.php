<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <title>ImmoEliza | form</title>

    <style>
      .row {
        border: 1px solid #7451eb;
        padding: 3px;
      }
      [class^="col"] {
        padding: 1rem;
        border: 2px solid #3fa5db;
      }
    </style>
  </head>

  <body>
    <header class="container-fluid">
      <div class="row">
        <div class="col">
          <h1>ImmoEliza</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p>We're the best because we have this very cool motto</p>
        </div>
      </div>
      <!-- Navbar -->
      <div class="row">
        <nav class="col bg-dark navbar navbar-dark navbar-expand-sm">
          <a class="navbar-brand" href="...">
            <img src="" alt="ImmoEliza logo" height="50" width="50" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarContent" class="collapse navbar-collapse">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="form.php">Form</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About us</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <?php 
      /*
      // Tests and syntax reminders

      // $_REQUEST accepts both GET and POST methods
      if (isset($_REQUEST['submit'])){
        //  $city = $_GET['city'];
        //  echo $city;
          echo "hello world";
          console.log("hello world");
          echo htmlentities($_REQUEST['postal_code']);
          console.log(htmlentities($_REQUEST['postal_code']));
      }
      */
    ?>

    <?php 
      // Check For Submit
      if(filter_has_var(INPUT_POST, 'submit')){
        // Check Required Fields (handled by browser via html attribute "required". Is it enough ?)

        // Get Form Data + sanitize inputs
          $postal_code = htmlspecialchars($_POST['postal_code']);
          $number_of_rooms = htmlspecialchars($_POST['number_of_rooms']);
          $house_area = htmlspecialchars($_POST['house_area']);
          $fully_equipped_kitchen = htmlspecialchars($_POST['fully_equipped_kitchen']);
          $open_fire = htmlspecialchars($_POST['open_fire']);
          $terrace = htmlspecialchars($_POST['terrace']);
          $garden = htmlspecialchars($_POST['garden']);
          $number_of_facades = htmlspecialchars($_POST['number_of_facades']);
          $swimming_pool = htmlspecialchars($_POST['swimming_pool']);
          $state_of_the_building = htmlspecialchars($_POST['state_of_the_building']);
          $construction_year = htmlspecialchars($_POST['construction_year']);
          $surface_of_the_land = htmlspecialchars($_POST['surface_of_the_land']);
          // Set Array
          $safe_input = [
            "postal_code" => $postal_code,
            "number_of_rooms" => $number_of_rooms,
            "house_area" => $house_area,
            "fully_equipped_kitchen" => $fully_equipped_kitchen,
            "open_fire" => $open_fire,
            "terrace" => $terrace,
            "garden" => $garden,
            "number_of_facades" => $number_of_facades,
            "swimming_pool" => $swimming_pool,
            "state_of_the_building" => $state_of_the_building,
            "construction_year" => $construction_year,
            "surface_of_the_land" => $surface_of_the_land
          ];
        
        // Validate inputs
        $filters = [
          //"postal_code" => FILTER_VALIDATE_INT,
          "number_of_rooms" => FILTER_VALIDATE_INT,
          "house_area" => FILTER_VALIDATE_INT,
          //"fully_equipped_kitchen" => FILTER_VALIDATE_BOOLEAN,
          //"open_fire" => FILTER_VALIDATE_BOOLEAN,
          //"terrace" => FILTER_VALIDATE_BOOLEAN,
          //"garden" => FILTER_VALIDATE_BOOLEAN,
          "number_of_facades" => FILTER_VALIDATE_INT,
          //"swimming_pool" => FILTER_VALIDATE_BOOLEAN,
          "state_of_the_building" => FILTER_VALIDATE_STRING,
          "construction_year" => FILTER_VALIDATE_INT,
          "surface_of_the_land" => FILTER_VALIDATE_INT
      ];
      $valid_input = filter_var_array($safe_input, $filters);
    }
      // Convert to JSON 
      //$json_input = json_encode($valid_input);

      // Send Form Data to API
      // API URL
      $url = 'https://immoeliza-real-estate.herokuapp.com/predict_house_tojson2';

      // Create a new cURL resource
      $ch = curl_init($url);

      // Setup request to send json via POST
      $data = $valid_input;

      $payload = json_encode($data);
      echo "<pre>";
      var_dump($payload);
      echo "</pre>";
      // Set the CURLOPT_POST option to true for POST request
      curl_setopt($ch, CURLOPT_POST, true);

      // Attach encoded JSON string to the POST fields
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

      // Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

      // Return response instead of outputting
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      // Execute the POST request
      $result = curl_exec($ch);

      $prediction = json_decode($result, true);

      echo "Prediction = ";
      echo var_dump($prediction);

      // Close cURL resource
      curl_close($ch);

    ?>

    <main class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-title">
              <h3>Form</h3>
            </div>
            <div class="card-body">
              <p>For apartments, ignore "surface of the land" TODO : toggle attribute "required" on input "land surface" accordingly</p>
              <!-- Form action depends on the category (house/aptment) since the url for the request is different, right ? -->
              <form action="form.php" method="post">
                <div class="input-group">
                  <label for="postal_code">Postal code</label>
                  <input type="text" name="postal_code" placeholder="postal_code" required="required" />
                </div>
                <div class="input-group">
                  <label for="number_of_rooms">Rooms</label>
                  <input type="int" name="number_of_rooms" placeholder="number_of_rooms" required="required" />
                </div>
                <div class="input-group"> 
                  <label for="house_area">Habitable area (m²)</label> 
                  <input type="int" name="house_area" placeholder="house_area in m2" required="required" />
                </div>
                <div class="input-group">  
                  <label for="fully_equipped_kitchen">Fully equipped kitchen</label><br>
                  <input type="radio" name="fully_equipped_kitchen" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="fully_equipped_kitchen" value="no" required="required" checked="checked">
                  <label for="no">No</label>
                </div>
                <div class="input-group">  
                  <label for="open_fire">Open fire</label><br>
                  <input type="radio" name="open_fire" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="open_fire" value="no" required="required" checked="checked">
                  <label for="no">No</label>
                </div>
                <div class="input-group">  
                  <label for="terrace">Terrace</label><br>
                  <input type="radio" name="terrace" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="terrace" value="no" required="required" checked="checked">
                  <label for="no">No</label>
                </div>
                <div class="input-group">  
                  <label for="garden">Garden</label><br>
                  <input type="radio" name="garden" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="garden" value="no" required="required" checked="checked">
                  <label for="no">No</label>
                </div>
                <div class="input-group">  
                  <label for="number_of_facades">Facades</label> 
                  <input type="int" name="number_of_facades" placeholder="number_of_facades" required="required" />
                </div>
                <div class="input-group">  
                  <label for="swimming_pool">Swimming pool</label><br>
                  <input type="radio" name="swimming_pool" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="swimming_pool" value="no" required="required" checked="checked">
                  <label for="no">No</label>
                </div>
                <div class="input-group">  
                  <label for="state_of_the_building">State of the building</label> 
                  <input type="text" name="state_of_the_building" placeholder="state_of_the_building" required="required" />
                </div>
                <div class="input-group"> 
                  <label for="construction_year">Year of construction</label> 
                  <input type="int" name="construction_year" placeholder="construction_year" required="required" />
                </div>
                <div class="input-group"> 
                  <label for="surface_of_the_land">Land surface</label>  
                  <input type="int" name="surface_of_the_land" placeholder="surface_of_the_land in m2" required="required" />
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Predict</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="container bg-dark text-light">
      <div class="row">
        <div class="col">
          <p>ImmoEliza &copy; 2020</p>
        </div>
      </div>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="assets/js/array.js"></script>
    <script src="assets/js/index.js"></script>

  </body>
</html>

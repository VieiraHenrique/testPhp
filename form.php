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
        // Check Required Fields (handled by browser (I guess ?) via html attribute "required". Is it enough ?)

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
            "postal code" => $postal_code,
            "number of rooms" => $number_of_rooms,
            "house area" => $house_area,
            "fully equipped kitchen" => $fully_equipped_kitchen,
            "open fire" => $open_fire,
            "terrace" => $terrace,
            "garden" => $garden,
            "number of facades" => $number_of_facades,
            "swimming pool" => $swimming_pool,
            "state of the building" => $state_of_the_building,
            "construction year" => $construction_year,
            "surface of the land" => $surface_of_the_land
          ];
        
        // Validate inputs
        $filters = [
          "postal code" => FILTER_VALIDATE_INT,
          "number of rooms" => FILTER_VALIDATE_INT,
          "house area" => FILTER_VALIDATE_INT,
          "fully equipped kitchen" => FILTER_VALIDATE_BOOLEAN,
          "open fire" => FILTER_VALIDATE_BOOLEAN,
          "terrace" => FILTER_VALIDATE_BOOLEAN,
          "garden" => FILTER_VALIDATE_BOOLEAN,
          "number of facades" => FILTER_VALIDATE_INT,
          "swimming pool" => FILTER_VALIDATE_BOOLEAN,
          "state of the building" => FILTER_VALIDATE_STRING,
          "construction year" => FILTER_VALIDATE_INT,
          "surface of the land" => FILTER_VALIDATE_INT
      ];
      $valid_input = filter_var_array($safe_input, $filters);
      
      // Convert to JSON 
      $json_input = json_encode($valid_input);
      // Send Form Data to API
    ?>
    <script>
      fetch('https://immoeliza-real-estate.herokuapp.com/predict_house_tojson2', {
        method : 'post',
        body: JSON.stringify($json_input)
    })
      .then((res) => res.json()) // returns res.json
      .then((data) => console.log(data))
      .catch((error) => console.log(error))
    </script>

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
              <form action="URL_WHERE_THE_FORM_IS_SENT" method="post">
                <input type="text" name="postal_code" placeholder="postal_code" required="required" />
                <input type="int" name="number_of_rooms" placeholder="number_of_rooms" required="required" />
                <input type="int" name="house_area" placeholder="house_area in m2" required="required" />
                <input type="text" name="fully_equipped_kitchen" placeholder="fully_equipped_kitchen" required="required" />
                <input type="text" name="open_fire" placeholder="open_fire" required="required" />
                <input type="text" name="terrace" placeholder="terrace" required="required" />
                <input type="text" name="garden" placeholder="garden" required="required" />
                <input type="int" name="number_of_facades" placeholder="number_of_facades" required="required" />
                <input type="text" name="swimming_pool" placeholder="swimming_pool" required="required" />
                <input type="text" name="state_of_the_building" placeholder="state_of_the_building" required="required" />
                <input type="int" name="construction_year" placeholder="construction_year" required="required" />
                <input type="int" name="surface_of_the_land" placeholder="surface_of_the_land in m2" required="required" />
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

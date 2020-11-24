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

if (isset($_GET['submit'])){
    $city = $_GET['city'];
    echo "hello world";
    echo $city;
}

    ?>
    <main class="container">
      <div class="row">
        <div class="col">
          <form action="" id="form">
            <input type="text" name="city" id="city" placeholder="Enter minimum 2 letters">
              <div>
                <select id="display">
                </select>
              </div>
            <input type="submit" id="submit" name="submit">
         </form>
        </div>
      </div>
    </main>
    <footer>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="assets/js/array.js"></script>
    <script src="assets/js/index.js"></script>

  </body>
</html>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>ImmoEliza | homepage</title>
  </head>
  
  <body>

    <?php include 'assets/inc/header.php'; ?>

    <main class="container">
      <div class="row">
        <div class="col">
          <h2>Who we are</h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero, tenetur ut, natus, voluptate possimus adipisci mollitia totam vitae itaque id ab beatae facere. Nobis qui nostrum sed corrupti maiores quia!</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2>Our amazing API</h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt necessitatibus assumenda voluptas enim, error quos exercitationem explicabo nam ab sequi nobis expedita aut provident perspiciatis quod delectus labore! Nisi, totam!</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <a href="form.php" class="btn btn-dark">Link to our form</a>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <h2>Check out the average price of a m2 in Belgium with this awesome map !</h2>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <iframe id="inlineFrame"
            title="Price prediction"
            width="625"
            height="500"
            src="https://immoeliza-real-estate.herokuapp.com/map_average_apartment_price">
          </iframe>
        </div>
      </div>
    </main>


    <?php include 'assets/inc/footer.php'; ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>

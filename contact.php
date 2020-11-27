<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/contact.css">
    <title>ImmoEliza | contact</title>
  </head>

  <body>

    <?php include 'assets/inc/header.php'; ?>
<!--
    <main class="container">
      <div class="row">
        <div class="col">
          <form action="" id="form">
            <input type="text" name="" id="" placeholder="contact form" />
            <input type="submit" id="submit" name="submit" />
          </form>
        </div>
      </div>
    </main>
-->

<div class="col-md-4">
  <div class="row justify-content-center">
    <div class="container-form">

      <form class="contact-form">
        <h2>Contact</h2>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Phone">
        </div>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <select id="inputState" class="form-control">
            <option selected>Buy</option>
            <option>Rent</option>
            <option>Other</option>
          </select>
        </div>
        <div class="form-group">
          <textarea class="form-control" rows="4" placeholder="Describe your request"></textarea>
        </div>
        <button type="button" class="btn btn-success">Send</button>
      </form>
    </div>
  </div>
</div>

    <?php include 'assets/inc/footer.php'; ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>

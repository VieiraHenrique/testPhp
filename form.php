<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <title>ImmoEliza | form</title>
  </head>

  <body>

    <?php include 'assets/inc/header.php'; ?>

    <?php 

    //If button "house"
    include 'assets/inc/predict_house.php';
    
    //If button "apartment"
    //include 'assets/inc/predict_apartment.php'; 
    
    ?>

    <main class="container">
      <div class="row">
        <div class="col">
          <p>For apartments, ignore "surface of the land" TODO : toggle attribute "required" on input "land surface" accordingly ;</p>
        </div> 
      </div>
      <div class="row">
        <div class="col-auto">
          <button class="btn btn-primary">House</button>
        </div>
        <div class="col-auto">
          <button class="btn btn-primary">Apartment</button>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <!-- Form action depends on the category (house/aptment) since the url for the request is different, right ? -->
          <form action="form.php" method="post">
            <div class="form-row">
              <div class="col-sm form-group">
                  <label for="postal_code">Postal code</label><br>
                  <input class="form-control" type="number" name="postal_code" placeholder="postal_code" min=1000 max=9999 required="required" />
              </div>
              <div class="col-sm form-group">
                  <label for="number_of_rooms">Rooms</label><br>
                  <input class="form-control" type="number" name="number_of_rooms" placeholder="number_of_rooms" min=1 required="required" />
              </div>
              <div class="col-sm form-group">  
                  <label for="number_of_facades">Facades</label><br> 
                  <input class="form-control" type="number" name="number_of_facades" placeholder="number_of_facades" min=1 max=4 required="required" />
              </div>
              <div class="col-sm form-group"> 
                  <label for="house_area">Habitable area (m²)</label><br>
                  <input class="form-control" type="number" name="house_area" placeholder="house_area in m2" min=1 required="required" />
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm form-group">
                  <label for="fully_equipped_kitchen">Fully equipped kitchen</label><br>
                  <input type="radio" name="fully_equipped_kitchen" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="fully_equipped_kitchen" value="no" required="required" checked="checked">
                  <label for="no">No</label>
              </div>
              <div class="col-sm form-group">  
                  <label for="open_fire">Open fire</label><br>
                  <input type="radio" name="open_fire" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="open_fire" value="no" required="required" checked="checked">
                  <label for="no">No</label>
              </div>
              <div class="col-sm form-group">  
                  <label for="terrace">Terrace</label><br>
                  <input type="radio" name="terrace" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="terrace" value="no" required="required" checked="checked">
                  <label for="no">No</label>
              </div>
              <div class="col-sm form-group">  
                  <label for="garden">Garden</label><br>
                  <input type="radio" name="garden" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="garden" value="no" required="required" checked="checked">
                  <label for="no">No</label>
              </div>
              <div class="col-sm form-group">  
                  <label for="swimming_pool">Swimming pool</label><br>
                  <input type="radio" name="swimming_pool" value="yes" required="required">
                  <label for="yes">Yes</label>
                  <input type="radio" name="swimming_pool" value="no" required="required" checked="checked">
                  <label for="no">No</label>
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm form-group"> 
                  <label for="state_of_the_building">State of the building</label><br> 
                  <select class="form-control" name="state_of_the_building" placeholder="state_of_the_building" required="required">
                    <option value="unknown">unknown</option>
                    <option value="as new">as new</option>
                    <option value="just renovated">just renovated</option>
                    <option value="good">good</option>
                    <option value="to renovate">to renovate</option>
                  </select>
              </div>
              <div class="col-sm form-group"> 
                  <label for="construction_year">Year of construction</label><br> 
                  <input class="form-control" type="number" name="construction_year" placeholder="construction_year" min=1000 required="required" />
              </div>
              <div class="col-sm form-group"> 
                  <label for="surface_of_the_land">Land surface</label><br>  
                  <input class="form-control" type="number" name="surface_of_the_land" placeholder="surface_of_the_land in m2" min=1 required="required" />
                  <small class="form-text text-muted">Total surface of the house and the surronding land.</small>
                </div>
              <div class="col-sm form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Predict</button>
                <div>
                  <?php echo print_r($prediction); ?>
                </div>
              </div>
            </div>    
          </form>
        </div>
      </div>
    </main>

    <?php include 'assets/inc/footer.php'; ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="assets/js/array.js"></script>
    <script src="assets/js/index.js"></script>


  </body>
</html>

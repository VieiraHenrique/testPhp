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
          "postal_code" => FILTER_VALIDATE_INT,
          "number_of_rooms" => FILTER_VALIDATE_INT,
          "house_area" => FILTER_VALIDATE_INT,
          "fully_equipped_kitchen" => "",
          "open_fire" => "",
          "terrace" => "",
          "garden" => "",
          "number_of_facades" => FILTER_VALIDATE_INT,
          "swimming_pool" => "",
          "state_of_the_building" => "",
          "construction_year" => FILTER_VALIDATE_INT,
          "surface_of_the_land" => FILTER_VALIDATE_INT
      ];
      $valid_input = filter_var_array($safe_input, $filters);
    }
    if(isset($valid_input)){
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
      
      //echo "Prediction = ";
      //echo var_dump($prediction);

      // Close cURL resource
      curl_close($ch);
    }
    ?>
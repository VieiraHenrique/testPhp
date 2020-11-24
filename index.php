


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>
</head>

<body>

<?php 

if (isset($_GET['submit'])){
    $city = $_GET['city'];
    echo "hello world";
    echo $city;
}

?>

    <form action="" id="form">
        <input type="text" name="city" id="city" placeholder="Enter minimum 2 letters">
        <div>
            <select id="display">

            </select>
        </div>
        <input type="submit" id="submit">
    </form>



    <script src="array.js"></script>
    <script src="index.js"></script>

</body>

</html>


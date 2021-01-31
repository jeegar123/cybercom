<?php
$user_poisition = $counrty = $no_of_emp = $fullname = $age = $hits = null;
$data = $file = $color = null;

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    $user_poisition = $_POST['user_poisition'] ?? null;
    $counrty = $_POST['counrty'] ?? null;
    $no_of_emp = $_POST['no_of_emp'] ?? null;
    $fullname = $_POST['fullname'] ?? null;
    $age = $_POST['age'] ?? null;
    $hits = $_POST['hits'] ?? null;
    $data = $_POST['data'] ?? null;
    $file = $_FILES['file'] ?? null;
    $color = $_POST['color'] ?? null;


    echo "$user_poisition $counrty $counrty $no_of_emp $fullname $age $hits $data $color";

    print_r($file);
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forms</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <caption>impact of Coronavirus on eCommerce</caption>
        <div class="form-group">
            <label>What is your job title?</label>
            <select name="user_poisition" id="" class="form-select">
                <option value="FOUNDER">FOUNDER</option>
                <option value="CEO">CEO</option>
                <option value="Director of Marketing"> Director of Marketing</option>
                <option value="CMO"> CMO / VP</option>
                <option value="Marketing Manager or equivalent"> Marketing Manager or equivalent</option>
            </select>
        </div>
        <div class="form-group">
            <label>Where is your company based?</label>
            <select name="country" id="form-select" class="form-select">
                <option value="india">India</option>
                <option value="america">America</option>
                <option value="japna"> Japan</option>
                <option value="china"> China</option>
            </select>
        </div>

        <div class="form-check">
            <label>How many employees do you have?</label>
            <input class="form-check-input" type="radio" name="no_of_emp" id="1" value=">=20">
            <label class="form-check-label" for="no_of_emp">
                less than 20
            </label>


            <input class="form-check-input" type="radio" name="no_of_emp" value="20+">
            <label class="form-check-label" for="no_of_emp">
                20+
            </label>
            <input class="form-check-input" type="radio" name="no_of_emp" id="2" value="40+">
            <label class="form-check-label" for="no_of_emp">
        40+
            </label>
            <input class="form-check-input" type="radio" name="no_of_emp" id="2" value="60+">
            <label class="form-check-label" for="no_of_emp">
          60+
            </label>
        </div>


        <div class="form-group">
            <label>FullName</label>
        </div>

        <div class="form-group">
            <label>Age</label>
            <input type="number" name="age" class="form-control" min="1">
        </div>

        <label for="customRange1" class="form-label">hits</label>
        <input type="range" class="form-range" id="customRange1" name="hits">


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="data" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="file">
        </div>
        <label for="exampleColorInput" class="form-label">Color picker</label>
        <input type="color" class="form-control form-control-color" name="color" id="exampleColorInput"  title="Choose your color">


        <button type="submit" class="btn btn-primary">Primary</button>

    </form>
</body>

</html>
<?php


$firstname = $password = $address = $gender = $day = $month = $year = $martial_status = $is_agree = null;
$games = [];
$date_of_birth = null;
if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

    // form data
    $firstname = $_POST['firstname'] ?? null;
    $password = $_POST['password'] ?? null;
    $address = $_POST['address'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $martial_status = $_POST['martial_status'] ?? null;
    $is_agree = $_POST['isagree'] ?? null;

    // date
    $month = $_POST['month'] ?? null;
    $day = $_POST['day'] ?? null;
    $year = $_POST['year'] ?? null;

    if (
        $day
        and $month
        and $year
    ) {
        $date_of_birth = "$year-$month-$day";
    }


    // games
    // game data
    $game_hockey = $_POST['hockey'] ?? null;
    $game_football = $_POST['football'] ?? null;
    $game_badminton = $_POST['badminton'] ?? null;
    $game_cricket = $_POST['cricket'] ?? null;
    $game_volleyball = $_POST['volleyball'] ?? null;

    // adding game
    if ($game_hockey)
        $games['hockey'] = $game_hockey;

    if ($game_football)
        $games['football'] = $game_football;

    if ($game_badminton)
        $games['badminton'] = $game_badminton;

    if ($game_cricket)
        $games['cricket'] = $game_cricket;

    if ($game_volleyball)
        $games['volleyball'] = $game_volleyball;
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-2</title>
    <link rel="stylesheet" href="./css/user-form-2.css">
</head>

<body>

    <form method="POST">
        <fieldset>
            <legend>User Form</legend>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" id="firstname"><span class="error" id="error-name"></span>
            </div>
            <div class="form-group">
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password"><span class="error " id="error-password"></span>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" id="male" value="male">Male
                <input type="radio" name="gender" id="male" value="female">Female
            </div>
            <div class="form-group">
                <label for="address"> Address</label>
                <textarea name="address" id="address" rows="5" cols="20"></textarea><span class="error" id="error-address"></span>
            </div>
            <div class="form-group">
                <label for="">D.O.B</label>
                <select name="month" id="month" required>
                    <option value="jan">Jan</option>
                </select>
                <select name="day" id="day" required>
                    <option value="1">1</option>
                </select>
                <select name="year" id="year" required>
                    <option value="1990">1990</option>
                </select>
            </div>


            <div class="form-group">
                <label>SELECT GAMES </label>
                <input type="checkbox" name="hockey" id="hockey" value="hockey">Hockey
                <input type="checkbox" name="football" id="football" value="football">football
                <input type="checkbox" name="badminton" id="Badminton" value="badminton">Badminton
                <input type="checkbox" name="cricket" id="cricket" value="cricket">cricket
                <input type="checkbox" name="volleyball" id="volleyball" value="volleyball">volleyball
            </div>

            <div class="form-group">
                <label for="status">Married Status</label>
                <input type="radio" name="martial_status" id="martial_status" value="Married">Married
                <input type="radio" name="martial_status" id="martial_status" value="Unmarried">Unmarried
            </div>
            <div>
                <input type="reset" value="Reset">
                <input type="submit" value="Submit Form" id="btnSubmit">
            </div>
            <input type="checkbox" name="isagree" id=""> I accept this agreement

        </fieldset>

    </form>


  <div>
  <?php

if (
    $firstname
    and $password
    and $address
    and $games
    and $gender
    and $date_of_birth
) {
    echo "<h3>Your data</h3>";

    echo "Your Name is $firstname<br>";
    echo "Your Password is $password<br>";
    echo "Your Games:<br>";

    echo "<ul>";

    foreach ($games as $game) {
        if ($game)
            echo "<li>$game</li>";
    }
    echo "</ul>";

    echo "You are $gender<br>";
    echo "You are $martial_status<br>";
    echo "Your birthdate $date_of_birth<br>";

    if ($is_agree) {
        echo "Thank you for accepting our Terms and policy";
    } else {
        echo "oh! You missed our terms and condition ";
    }
}
?>

  </div>


    <script src="./js/user-form-2.js"></script>


</body>

</html>
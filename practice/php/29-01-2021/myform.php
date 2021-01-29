<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forms</title>
    <style>
        input,
        textarea {
            display: block;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <form>
        <input type="text" name="name" id="name" placeholder="name">
        <textarea name="bio" cols="30" rows="5" placeholder="bio"></textarea>
        <input type="submit" value="submit">
    </form>

    <div>
        <!-- display data -->
        <?php

        if (isset($_GET['name']) and isset($_GET['bio'])) {
            $name = htmlentities($_GET['name']);
            // $name = $_GET['name'] ?? null;
            $bio = htmlentities($_GET['bio']);

            if ($name && $bio) {
                echo 'Name : <strong>' . $name . '</strong><br>';
                echo "Bio : $bio";
            }
        }


       

        ?>

    </div>

</body>

</html>
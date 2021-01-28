<?php


$data = $_POST['data'] ?? "";
$search_word = $_POST['search_word'] ?? "";
$replace_word = $_POST['replace_word'] ?? "";


if ($data and $search_word && $replace_word) {
    $data = str_replace($search_word, $replace_word, $data);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mini</title>
    <style>
        input {
            display: block;
            margin-top: 30px;

        }
    </style>
</head>

<body>
    <h1>Mini String Replace and Search Demo</h1>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <textarea cols="100" rows="10" name="data"><?= $data ?></textarea>
        <input type="text" name="search_word" placeholder="search word">
        <input type="text" name="replace_word" id="" placeholder="replace word">
        <input type="submit" value="submit">
    </form>
</body>

</html>
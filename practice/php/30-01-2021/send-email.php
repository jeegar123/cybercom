<?php


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $receiver = htmlentities($_POST['receptionist_email']) ?? null;
    $subject = htmlentities($_POST['subject']) ?? null;
    $body = htmlentities($_POST['body']) ?? null;


    if(mail($receiver,$subject,$body)){
        echo "mail sended";
    }else{
        echo "unable to send mail";
    }

}



?>


<head>
    <style>
        input {
            display: block;
        }
    </style>
</head>


<form method="post">
    <input type="email" name="receptionist_email" id="" placeholder="Email">
    <input type="text" name="subject" id="subject" placeholder="Subject">
    <textarea name="body" cols="30" rows="10" placeholder="Body"></textarea>
    <input type="submit" value="send Email">

</form>
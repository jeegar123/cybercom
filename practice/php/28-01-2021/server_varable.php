<?php


date_default_timezone_set('Asia/kolkata');

echo $_SERVER['PHP_SELF'].'<br>';
echo $_SERVER['SERVER_ADDR'].'<br>';
echo $_SERVER['SERVER_NAME'].'<br>';
echo $_SERVER['SERVER_SOFTWARE'].'<br>';
echo $_SERVER['SERVER_PROTOCOL'].'<br>';
echo $_SERVER['REQUEST_METHOD'].'<br>';
echo date('H:i:s',$_SERVER['REQUEST_TIME']).'<br>';
echo $_SERVER['QUERY_STRING'].'<br>';
echo $_SERVER['DOCUMENT_ROOT'].'<br>';
// echo $_SERVER['HTTP_ACCEPT_CHARSET'].'<br>';
echo $_SERVER['HTTP_ACCEPT'].'<br>';
echo $_SERVER['HTTP_CONNECTION'].'<br>';
echo $_SERVER['HTTP_HOST'].'<br>';
echo $_SERVER['HTTP_REFERER'].'<br>';
echo $_SERVER['HTTP_USER_AGENT'].'<br>';
// echo $_SERVER['HTTPS'].'<br>';
echo $_SERVER['REMOTE_ADDR'].'<br>';
// echo $_SERVER['REMOTE_HOST'].'<br>';
echo $_SERVER['REMOTE_PORT'].'<br>';
// echo $_SERVER['REMOTE_USER'].'<br>';
// echo $_SERVER['REDIRECT_REMOTE_USER'].'<br>';
echo $_SERVER['SCRIPT_FILENAME'].'<br>';
echo $_SERVER['SERVER_ADMIN'].'<br>';
echo $_SERVER['SERVER_PORT'].'<br>';
echo $_SERVER['SERVER_SIGNATURE'].'<br>';
// echo $_SERVER['PATH_TRANSLATED'].'<br>';
// echo $_SERVER['AUTH_TYPE'].'<br>';
echo $_SERVER['SCRIPT_NAME'].'<br>';
echo $_SERVER['REQUEST_URI'].'<br>';
// echo $_SERVER['PATH_INFO'].'<br>';
// echo $_SERVER['ORIG_PATH_INFO'].'<br>';

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

echo $hostname;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
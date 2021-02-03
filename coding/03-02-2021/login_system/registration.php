<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- login page -->
        <h1 class="text-center">Registration Page</h1>
        <form action="./core/add_user.php" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="email" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" maxlength="8">
                <small id="helpId" class="form-text text-muted">Maximum 8 length</small>
            </div>
            <input type="submit" value="Register" class="btn btn-primary">
        </form>
     

    </div>

</body>

</html>
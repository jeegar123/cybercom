<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/icons/fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-info w-100">
        <div class="font-weight-bold d-inline-block header">CURD PRACTICE</div>
        <a class="mr-0 " id="logout-btn">Logout</a>
    </nav>
    <div class="conatiner">

        <div class="m-5 ">
            <form>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="name" id="name" placeholder="enter name" class="form-control">
                        <span class="alert-danger" id="error-name"></span>
                    </div>
                    <div class="col-lg-6 ">
                        <input type="submit"  class="btn btn-primary" value="Add" id="addName">
                    </div>
                </div>
            </form>
        </div>

        <div id="display-names">

        </div>


    </div>
    <script src="../vendor/js/jquery.js"></script>
    <script src="./home.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h1 class="display-4">Bootstrap Form</h1>
        <form action="" method="post" novalidate>

            <div class="row">

                <div class="form-group col-8">
                    <label for="name">Name</label><span id="name-error-message" class="invalid"></span>
                    <div class="input-group-prepend">
                        <span>
                            <i class="fa fa-user-o fa-2x " aria-hidden="true"></i>
                        </span>
                        <input type="text" name="name" id="name" class="form-control p-1">
                    </div>
                </div>
                <div class="form-group col-8">
                    <label for="username">Email</label><span id="email-error-message" class="invalid"></span>
                    <div class="input-group-prepend">
                        <span>
                            <i class="fa fa-envelope-o fa-2x " aria-hidden="true"></i>
                        </span>
                        <input type="email" name="username" id="username" class="form-control p-1">
                    </div>
                </div>
                <div class="form-group col-8">
                    <label for="subject">Subject</label><span id="subject-error-message" class="invalid"></span>
                    <div class="input-group-prepend">
                        <span>
                            <i class="fa fa-question fa-2x " aria-hidden="true"></i>
                        </span>
                        <input type="text" name="subject" id="subject" class="form-control p-1">
                    </div>
                </div>
                <div class="form-group col-8">
                    <label for="message">Message</label><span id="message-error-message" class="invalid"></span>
                    <div class="input-group-prepend">
                        <span>
                            <i class="fa fa-pencil fa-2x h-100 mt-auto " aria-hidden="true"></i>
                        </span>
                        <textarea class="form-control" id="message" name="message" style="height: 100px"></textarea>
                    </div>
                </div>
                <div>
                </div>

            </div>

        </form>

    </div>
</body>

</html>
<form action="" method="POST" >
    <div class="row">
        <div class="col">
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                <span class="alert-danger" id="error-name"></span>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <input type="email" class="form-control" name="username" id="username" placeholder="abc@email.com">
                <span class="alert-danger" id="error-username"></span>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="********">
                <span class="alert-danger" id="error-password"></span>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary w-100" id="btnSubmit">
            </div>
        </div>
    </div>
</form>
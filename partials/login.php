<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 d-flex vh-100 align-items-center">
                <div class="card w-100 h-75 p-4">
                    <h4 class="text-center mb-5 mt-2">LOGIN</h4>
                    <div class="card-body mt-3 ps-5 pe-5">
                        <form method="post" action="controller/cek_login.php">
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="exampleInputEmail1" class="form-label">Alamat Email:</label>
                                <input type="text" class="form-control" style="width: 60%;" name="user" placeholder="Masukan Username Anda">
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <label for="exampleInputEmail1" class="form-label">Password:</label>
                                <input type="password" class="form-control" style="width: 60%;" name="pass" placeholder="Masukan Password Anda">
                            </div>
                            <div class="text-end">
                                <input type="submit" class="btn btn-primary mb-3" style="width: 60%;" value="Login">
                                <input type="button" class="btn btn-success" style="width: 60%;" value="Create Account">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
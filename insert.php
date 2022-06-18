<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW CUSTOMER</title>
    <link rel="stylesheet" href="css/bootstrap5.css">
</head>
<body>

    <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col-md-12 p-2 text-center">
                <h1 class="text-white">C R U D</h1>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 text-left">
                <a href="list.php" class="btn btn-sm btn-danger">B A C K</a>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center ">
                <h3>NEW CUSTOMER</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="store.php" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <label for="customer_name" class="form-label">Name</label>
                                        <input type="text" name="customer_name" id="customer_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <label for="customer_email" class="form-label">E-mail</label>
                                        <input type="email" name="customer_email" id="customer_email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <label for="customer_address" class="form-label">Address</label>
                                        <textarea name="customer_address" id="customer_address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <label for="customer_image" class="form-label">Image</label>
                                        <input type="file" name="customer_image" id="customer_image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 text-center">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="S A V E" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php

    // Connection with DB
    include('connection.php');

    $customer_id = $_GET['id'];
    
    if(isset($customer_id))
    {
        // QUERY FOR GET OLD DATA
        $sql = "SELECT * FROM customers WHERE id='$customer_id'";
        $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $customer = mysqli_fetch_assoc($run);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT CUSTOMER</title>
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
                <h3>EDIT CUSTOMER</h3>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="update.php" enctype="multipart/form-data" method="POST">
                            <div class="row">
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?php echo $customer['id']; ?>">
                                        <input type="hidden" name="old_image" value="<?php echo $customer['image']; ?>">
                                        <label for="customer_name" class="form-label">Name</label>
                                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo (isset($customer['name'])) ? $customer['name'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <label for="customer_email" class="form-label">E-mail</label>
                                        <input type="email" name="customer_email" id="customer_email" class="form-control" value="<?php echo (isset($customer['email'])) ? $customer['email'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <label for="customer_address" class="form-label">Address</label>
                                        <textarea name="customer_address" id="customer_address" class="form-control" rows="5"><?php echo (isset($customer['address'])) ? $customer['address'] : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-group">
                                        <label for="customer_image" class="form-label">Image</label>
                                        <input type="file" name="customer_image" id="customer_image" class="form-control">
                                        <br>
                                        <!-- Show Image -->
                                        <?php
                                            if(file_exists('customer_images/'.$customer['image']))
                                            {
                                                ?>
                                                    <img src="customer_images/<?php echo $customer['image'] ?>" width="60">
                                                <?php
                                            }
                                            else
                                            {
                                                echo '<p>Image Not Found</p>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3 text-center">
                                    <div class="form-group">
                                        <input type="submit" name="submit" value="U P D A T E" class="btn btn-success">
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
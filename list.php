<?php

    // Connection with DATABASE
    include('connection.php');

    // Indian Timezone
    date_default_timezone_set('Asia/Kolkata');

    // QUERY FOR GET DATA
    $sql = "SELECT * FROM customers";
    $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMERS</title>
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align: right;">
                <a href="insert.php" class="btn btn-sm btn-primary">I N S E R T</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 text-center ">
                <h3>CUSTOMERS LIST</h3>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <table class="table table-hovered table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(mysqli_num_rows($run) > 0)
                            {
                                while($customers = mysqli_fetch_assoc($run))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $customers['id']; ?></td>
                                            <td><?php echo $customers['name']; ?></td>
                                            <td><?php echo $customers['email']; ?></td>
                                            <td><?php echo $customers['address']; ?></td>
                                            <td>
                                                <?php
                                                    if(isset($customers['image']))
                                                    {
                                                        if(file_exists('customer_images/'.$customers['image']))
                                                        {
                                                            ?>
                                                                <img src="customer_images/<?php echo $customers['image'] ?>" width="60">
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            echo '<p>Image Not Found</p>';
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo '-';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo date('d-m-Y h:i:s',strtotime($customers['created_at'])); ?></td>
                                            <td class="text-center">
                                                <a href="edit.php?id=<?php echo $customers['id']; ?>" class="btn btn-sm btn-primary mt-1">EDIT</a>
                                                <a href="delete.php?id=<?php echo $customers['id']; ?>" class="btn btn-sm btn-danger mt-1">DELETE</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Customers Not Avavilable
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
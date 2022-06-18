<?php

    // Connection with DB
    include('connection.php');

    $customer_id = $_GET['id'];

    if(isset($customer_id))
    {
        // QUERY FOR DELETE DATA
        $sql = "DELETE FROM customers WHERE id='$customer_id'";
        $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    }

    header('Location:list.php');

?>
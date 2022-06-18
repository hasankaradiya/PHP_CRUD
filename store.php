<?php

    // Connection with DB
    include('connection.php');

    // Indian Timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d h:i:s');

    if(isset($_POST['submit']))
    {

        $name = $_POST['customer_name'];
        $email = $_POST['customer_email'];
        $address = $_POST['customer_address'];

        $image = $_FILES['customer_image'];
        $image_name = $image['name'];
        $tmp_name = $image['tmp_name'];

        if(isset($image))
        {
            // Upload Image
            move_uploaded_file($tmp_name,'customer_images/'.$image_name);
        }

        // QUERY FOR INSERT NEW DATA
        $sql = "INSERT INTO customers(name,email,address,image,created_at) VALUES('$name','$email','$address','$image_name','$date')";
        $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));    
    }
    
    header('Location:list.php');

?>
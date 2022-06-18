<?php

    // Connection with DB
    include('connection.php');

    // Indian Timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d h:i:s');

    if(isset($_POST['submit']))
    {
        $customer_id = $_POST['id'];
        $name = $_POST['customer_name'];
        $email = $_POST['customer_email'];
        $address = $_POST['customer_address'];

        $image = $_FILES['customer_image'];

        if(!empty($image['name']))
        {
            $image_name = $image['name'];
            $tmp_name = $image['tmp_name'];
            
            // Delete Old Image
            if(file_exists('customer_images/'.$_POST['old_image']))
            {
                unlink('customer_images/'.$_POST['old_image']);
            }

            // Upload New Image
            move_uploaded_file($tmp_name,'customer_images/'.$image_name);
        }
        else
        {
            $image_name = $_POST['old_image'];
        }

        // QUERY FOR UPDATE DATA
        $sql = "UPDATE customers SET name='$name', email='$email', address='$address', image='$image_name', updated_at ='$date' WHERE id='$customer_id'";
        $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    }
    header('Location:list.php');

?>
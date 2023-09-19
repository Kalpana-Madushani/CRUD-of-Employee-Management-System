
<?php

    include 'config.php';

    if(isset($_POST['update_employee'])){

        $update_id = $_POST['update_id'];
        $update_name = $_POST['update_name'];
        $update_bdy = $_POST['update_bdy'];
        $update_phone = $_POST['update_phone'];
        $update_email = $_POST['update_email'];
        $update_edu = $_POST['update_edu'];
        $update_skill = $_POST['update_skill'];
     
        mysqli_query($conn, "UPDATE employee SET Name = '$update_name', Birthday = '$update_bdy', 
        Phone = '$update_phone', Email = '$update_email', Education = '$update_edu', Skills = '$update_skill'
         WHERE eid = '$update_id'") or die('query failed1');
     
        $update_image = $_FILES['update_image']['name'];
        $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
        $update_image_size = $_FILES['update_image']['size'];
        $update_old_image = $_POST['update_old_image'];
     
        if(!empty($update_image)){
           if($update_image_size > 2000000){
              $message[] = 'image file size is too large';
           }else{
              mysqli_query($conn, "UPDATE employee SET ProfilePic = '$update_image' WHERE eid = '$update_id'") or die('query failed2');
           }
        }

        header('Location: index.php');
     }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <!-- nav bar start -->
        <?php
        include 'navbar.php'
        ?>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
                <?php
                include 'sidebar.php'
                ?>
            <!-- Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <section class="edit-employee-form">
                <div class="container mt-4">
                    <h2>Employee Information Form</h2>

<?php
   if(isset($_GET['update'])){
      $update_id = $_GET['update'];
      $update_query = mysqli_query($conn, "SELECT * FROM employee WHERE eid = '$update_id'") or die('query failed3');
      if(mysqli_num_rows($update_query) > 0){
         while($fetch_update = mysqli_fetch_assoc($update_query)){
?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="update_id" value="<?php echo $fetch_update['eid']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="update_name" value="<?php echo $fetch_update['Name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Birthday</label>
                            <input type="date" class="form-control" name="update_bdy" value="<?php echo $fetch_update['Birthday']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="tel" class="form-control" name="update_phone" value="<?php echo $fetch_update['Phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="update_email" value="<?php echo $fetch_update['Email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Education</label>
                            <select class="form-control" name="update_edu" value="<?php echo $fetch_update['Education']; ?>">
                                <option>High School</option>
                                <option>Associate Degree</option>
                                <option>Bachelor Degree</option>
                                <option>Master Degree</option>
                                <option>Ph.D.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Skills</label>
                            <input type="text" class="form-control" name="update_skill" value="<?php echo $fetch_update['Skills']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="profilePicture">Profile Picture</label>
                            <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['ProfilePic']; ?>">
                            <img src="uploaded_img/<?php echo $fetch_update['ProfilePic']; ?>" alt="">
                            <input type="file" class="form-control-file" name="update_image" accept="image/jpg, image/jpeg, image/png">
                        </div>

                        <input type="submit" value="update" name="update_employee" class="btn btn-success">
                    </form>
                    <?php
                        }
                    }
                    }else{
                        echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
                    }
                    ?>
                </div>
            </section>
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

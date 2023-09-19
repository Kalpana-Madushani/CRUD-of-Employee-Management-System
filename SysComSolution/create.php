<?php

include 'config.php';

if(isset($_POST['add_employee'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $bdy = $_POST['bdy'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $edu = $_POST['edu'];
    $skill = $_POST['skill'];
    $img = basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($img,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $img)) {

        $select_employee_name = mysqli_query($conn, "SELECT name FROM employee WHERE Name = '$name'") or die('query failed1');
 
            if(mysqli_num_rows($select_employee_name) > 0){
            echo 'employee name already added';
            }else{

            // Insert data into the database
            $insertQuery = "INSERT INTO employee (Name, Birthday, Phone, Email, Education, Skills, ProfilePic) 
                            VALUES ('$name', '$bdy', '$phone', '$email', '$edu', '$skill', '$img')";
                if (mysqli_query($conn, $insertQuery)) {
                    echo 'employee added successfully!';
                } else {
                    echo 'employee could not be added!';
                }
            }

            header('Location: index.php');
            
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Close the database connection
    mysqli_close($conn);
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
                <div class="container mt-4">
                <h2>Employee Information Form</h2>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                            <input type="date" class="form-control" name="bdy">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="education">Education</label>
                            <select class="form-control" name="edu">
                                <option>High School</option>
                                <option>Associate Degree</option>
                                <option>Bachelor Degree</option>
                                <option>Master Degree</option>
                                <option>Ph.D.</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills</label>
                            <input type="text" class="form-control" name="skill" placeholder="Enter your skills">
                        </div>
                        <div class="form-group">
                            <label for="profilePicture">Profile Picture</label>
                            <input type="file" class="form-control-file" name="image" accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <button type="submit" class="btn btn-primary" name="add_employee">Submit</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

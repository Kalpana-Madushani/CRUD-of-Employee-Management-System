
<?php

include 'config.php';

$eid = $_GET['delete'];

$sql = "SELECT * FROM employee WHERE eid = $eid";
$result = $conn->query($sql);

if(isset($_POST['delete_row'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM employee WHERE eid = '$delete_id'") or die('query failed');
    
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
                <div class="container mt-4">
                    <h2>Employee Information</h2>
                    <div class="row">

            <?php

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                    ?>

                    <form action="" method="post">
                        <table width="500" height="500">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?php echo $row["Name"] ?></td>
                            </tr>
                            <tr>
                                <td>Birthday</td>
                                <td>:</td>
                                <td><?php echo $row["Birthday"] ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><?php echo $row["Phone"] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $row["Email"] ?></td>
                            </tr>
                            <tr>
                                <td>Education</td>
                                <td>:</td>
                                <td><?php echo $row["Education"] ?></td>
                            </tr>
                            <tr>
                                <td>Skills</td>
                                <td>:</td>
                                <td><?php echo $row["Skills"] ?></td>
                            </tr>
                            <tr>
                                <td>Profile Picture</td>
                                <td>:</td>
                                <td>
                                    <div class="img-container w-50">
                                        <img src="<?php echo $row["ProfilePic"] ?>" alt="Profile Picture" class="img-fluid">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <input type="submit" value="delete" name="delete_row" class="btn btn-danger" onclick="return confirm('delete this employee?');">
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php
                    }

                } else {
                    echo "No records found";
                }
            ?>

            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

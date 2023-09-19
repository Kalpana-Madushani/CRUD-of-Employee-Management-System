<?php

include 'config.php';

$sql = "SELECT eid, Name, Birthday, Phone, Email FROM employee";
$result = $conn->query($sql);

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
                    <form class="form-inline">
                        <div class="input-group">
                            <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                            <div class="pl-4">
                                <a href="create.php" class="btn btn-primary ml-auto" type="button">+Add</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container mt-4">

                    <h2>Employee Details</h2>
                    <table class="table table-bordered">
                        <thead align="center">
                            <tr>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>

                        <?php

                        if ($result->num_rows > 0) {

                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Name"] . "</td>";
                                echo "<td>" . $row["Birthday"] . "</td>";
                                echo "<td>" . $row["Phone"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";

                                $eid = $row["eid"];

                                echo "<td align='center'><a href='employee.php?eid=$eid' class='btn btn-success'>View</a></td>";
                                echo "<td align='center'><a href='edit.php?update=$eid' class='btn btn-primary'>Edit</a></td>";
                                echo "<td align='center'><a href='delete.php?delete=$eid' class='btn btn-danger'>Delete</a></td>";

                                echo "</tr>";
                                echo "</tbody>";
                            }

                            echo "</table>";
                        } else {
                            echo "No records found";
                        }

                        ?>
                </div>
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
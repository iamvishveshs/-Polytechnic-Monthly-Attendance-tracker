<?php
require("check.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher Request -GPH</title>

    <?php require("styles.php"); ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require("sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require("topbar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
-->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Phone</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $requestQuery = "SELECT * FROM `request`";
                                        if ($requestResult = mysqli_query($conn, $requestQuery)) {
                                            while ($requestRow = mysqli_fetch_assoc($requestResult)) {

                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $requestRow['name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $requestRow['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $requestRow['password']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $requestRow['phone_number']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $requestRow['department']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $requestRow['designation']; ?>
                                                    </td>
                                                    <td><a class="btn btn-primary mb-1"
                                                            href="approveRequest.php?id=<?php echo $requestRow['id']; ?>">Approve
                                                            Now</a>
                                                        <br>
                                                        <a class="btn btn-danger"
                                                            href="simpleQueries.php?id=<?php echo $requestRow['id']; ?>&name=deleteRequest">Delete
                                                            Request</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">

                <!-- Logout Modal-->


                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Monthly Attendance Tracker |
                            <?php echo date("Y"); ?>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require("scripts.php"); ?>
    <?php require("toast.php"); ?>
</body>

</html>
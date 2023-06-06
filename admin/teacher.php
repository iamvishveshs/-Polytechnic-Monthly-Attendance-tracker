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

    <title>Teacher's data</title>

    <?php require("styles.php"); ?>
    <style>
        #inputId {
            text-align: center;
            padding: 0;
            background: none;
            border: none;
            border-radius: 0;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
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
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Teachers</h6>
                            <a class="btn btn-primary" href="./addTeacher.php">Add New Teacher</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $teacherListQuery = "SELECT * FROM `user` WHERE `role`!='admin'";
                                        if ($teacherListResult = mysqli_query($conn, $teacherListQuery)) {
                                            while ($Row = mysqli_fetch_assoc($teacherListResult)) {

                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $Row['name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $Row['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $Row['phone_number']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $Row['department']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $Row['designation']; ?>
                                                    </td>
                                                    <td>
                                                    <a class='btn btn-primary'
                                                                        href='updateTeacher.php?id=<?php echo $Row['id']; ?>&name=<?php echo $Row['name']; ?>&email=<?php echo $Row['email']; ?>&phone=<?php echo $Row['phone_number']; ?>&designation=<?php echo $Row['designation']; ?>&department=<?php echo $Row['department']; ?>'>Update
                                                                        Data</a>
                                                                    <br>
                                                                    <br>
                                                                    <button type='button' class='btn btn-danger' data-toggle='modal'
                                                                        data-target='#exampleModal'
                                                                        data-tid='<?php echo $Row['id']; ?>'>Delete</button>
                                                        
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="true" data-keyboard="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deletion Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="simpleQueries.php" method="POST">
                        <p>Are you sure you want to delete the teacher?<br>
                            please delete all the subjects assigned and if he/she is class teacher please un-assign him/her
                        </p>
                        <input type="text" class="mb-1" name="id" id="inputId" value="" readonly>
                        <div class="d-flex justify-content-between">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Don't
                                Delete</button>
                            <input type="submit" class="btn btn-danger" name="deleteTeacher" value="Yes, Delete Teacher">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php require("scripts.php"); ?>
    <script>
        $(document).ready(function() {
            $('button').click(function() {
                var tid = $(this).data('tid');
                $('#inputId').val(tid)
            })
        })
    </script>
    <?php require("toast.php"); ?>
</body>

</html>
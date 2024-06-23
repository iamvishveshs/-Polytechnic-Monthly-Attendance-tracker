<?php
require("check.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attendance Tables</title>

    <?php require("styles.php"); ?>
    <style>
        #inputTableName {
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
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Attendance Tables</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Table Name</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /*Getting names of the attendance tables which are created by Admin*/
                                        $requestQuery = "show tables LIKE '%Attendance%'";
                                        if ($requestResult = mysqli_query($conn, $requestQuery)) {
                                            while ($requestRow = mysqli_fetch_assoc($requestResult)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php /*displaying the table anem*/echo $requestRow['Tables_in_if0_36774060_ams (%Attendance%)']; ?>
                                                    </td>
                                                    <td><!--Delete button will open a confirmation modal-->
                                                        <button type='button' class='btn btn-danger' data-toggle='modal'
                                                            data-target='#exampleModal'
                                                            data-tablename="<?php echo $requestRow['Tables_in_if0_36774060_ams (%Attendance%)']; ?>">Drop
                                                            Table</button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="true" data-keyboard="true"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p id="TableName">Are you sure you want to delete the student </p>
                        <input type="text" class="mb-1" name="TableName" id="inputTableName" value="" readonly>
                        <p id="sname"></p>
                        <div class="d-flex justify-content-between">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Don't
                                Delete</button>
                            <input type="submit" class="btn btn-danger" name="deleteTable" value="Yes, Delete Table">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <?php require("scripts.php"); ?>
    <script>
        $(document).ready(function () {
            $('button').click(function () {
                var tablename = $(this).data('tablename');
                console.log(tablename)
                $('#inputTableName').val(tablename)
                $('#TableName').append(tablename + "?")
            })
        })
    </script>
    <?php require("toast.php"); ?>
</body>

</html>
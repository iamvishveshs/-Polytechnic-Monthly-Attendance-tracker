<?php
require("check.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_REQUEST['bulkdelete'])) {
    $sem = $_REQUEST['sem'];
    $studentDataQuery = mysqli_query($conn, "SELECT * FROM `student` WHERE sem='$sem'");
    if (mysqli_num_rows($studentDataQuery) > 0) {
        if (mysqli_query($conn, "DELETE FROM `student` WHERE `sem`='$sem'")) {
            header("Location:./bulkDeleteStudent.php?alert=Students Deleted sccessfuly.");
        } else {
            $error = "Unable to delete students from sem " . $sem.".";
        }
    } else {
        $error = "There are no students in sem " . $sem . " to  delete.";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bulk Delete Students</title>
    <style>
        #inputId1,
        #inputId2 {
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Use it on your own risk,All the students of the selected semester will be deleted</h6>
                        </div>
                        <form>
                            <?php
                            if (isset($error)) {
                                echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span>" . $error . "</h6><br></div>";
                            }

                            ?>
                            <div class="controls">
                                <label for="sem">Semester (From where students are to be deleted)</label>
                                <select required="" id="sem">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="controls">
                                <button class="btn btn-primary" id="deleteButton" type='button' data-toggle='modal'
                                    data-target='#exampleModal'>Bulk Delete
                                    Students</button>
                            </div>
                        </form>

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

                        <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                            <p>Are you sure you want to delete all  the students of 
                            <input type="text" class="mb-1" name="sem" id="inputId1" value="" readonly>
                            ?</p>
                            <div class="d-flex justify-content-between">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Don't
                                    delete</button>
                                <input type="submit" class="btn btn-danger" name="bulkdelete" value="Yes, Bulk delete">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



        <?php require("scripts.php"); ?>
        <script>
            $(document).ready(function () {
            $('#deleteButton').click(function () {
                    var sem1 = $("#sem").val();

                        $('#inputId1').val(sem1)
                })
        })
        </script>
        <?php require("toast.php"); ?>
</body>

</html>
<!-- Vertically centered modal -->
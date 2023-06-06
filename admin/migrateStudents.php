<?php
require("check.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_REQUEST['migrate'])) {
    $fromsem = $_REQUEST['MigrateFromSem'];
    $Tosem = $_REQUEST['MigrateToSem'];
    $studentDataQuery = mysqli_query($conn, "SELECT * FROM `student` WHERE sem='$fromsem'");
    if (mysqli_num_rows($studentDataQuery) > 0) {
        if (mysqli_query($conn, "UPDATE `student` SET `sem`='$Tosem' WHERE `sem`='$fromsem'")) {
            header("Location:./migrateStudents.php?alert=Students migrated sccessfuly.");
        } else {
            $error = "Unable to migrate students from sem " . $fromsem . " to sem " . $Tosem . ".";
        }
    } else {
        $error = "There are no students in sem " . $fromsem . " to  migrate.";
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

    <title>Promote Students</title>
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
                            <h6 class="m-0 font-weight-bold text-primary">Student Migration</h6>
                        </div>
                        <form>
                            <?php
                            if (isset($error)) {
                                echo "<div class='text-center'><h6><span class='text-danger'>ERROR: </span>" . $error . "</h6><br></div>";
                            }

                            ?>
                            <div class="controls">
                                <label for="MigrateFrom">Semester (From Migrate)</label>
                                <select required="" id="MigrateFrom">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="controls">
                                <label for="MigrateTo">Semester (To Migrate)</label>
                                <select required="" id="MigrateTo">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="controls">
                                <button class="btn btn-primary" id="migrateButton" type='button' data-toggle='modal'
                                    data-target='#exampleModal'>Migrate
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
                            <p>Are you sure you want to migrate the students of <span id="sem1"></span> to <span
                                    id="sem2"></span>?</p>
                            <input type="text" class="mb-1" name="MigrateFromSem" id="inputId1" value="" readonly> To
                            <input type="text" class="mb-1" name="MigrateToSem" id="inputId2" value="" readonly>
                            <p id="sname"></p>
                            <div class="d-flex justify-content-between">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Don't
                                    Migrate</button>
                                <input type="submit" class="btn btn-danger" name="migrate" value="Yes, Migrate">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>



        <?php require("scripts.php"); ?>
        <script>
            $(document).ready(function () {
                $('#migrateButton').click(function () {
                    var sem1 = $("#MigrateFrom").val();
                    var sem2 = $("#MigrateTo").val();
                    if (sem1 == sem2) {
                        $('#exampleModal').modal('hide')
                        $("#MigrateFrom").val('1');
                        $("#MigrateTo").val('2');
                        alert("Students can't be migrated to same semester.");
                        $('#exampleModal').modal('hide')
                    }
                    else {

                        $('#inputId1').val(sem1)
                        $('#inputId2').val(sem2)
                        $('#sem1').append(sem1)
                        $('#sem2').append(sem2)
                    }
                    $('#exampleModal').modal('show');
                })
            })
        </script>
        <?php require("toast.php"); ?>
</body>

</html>
<!-- Vertically centered modal -->
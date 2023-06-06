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

    <title>students</title>
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
                            <h6 class="m-0 font-weight-bold text-primary">Student</h6>

                        </div>
                        <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                            <div class="controls">
                                <label for="sem">Semester</label>
                                <select name="sem" required="" id="sem">
                                    <?php
                                    $teacher_id = $_SESSION['CteacherId'];
                                    $semQuery = "SELECT * FROM `class_teacher` WHERE teacher_id=" . $teacher_id . "";
                                    if ($semResult = mysqli_query($conn, $semQuery)) {
                                        while ($semRow = mysqli_fetch_assoc($semResult)) {

                                            ?>
                                            <option value="<?php echo $semRow['sem']; ?>"><?php echo $semRow['sem']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="controls">
                                <button type="submit" name="getStudentFromSem" class="btn btn-primary">Show
                                    Students</button>
                            </div>
                        </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <?php
                                    //Runs when "show students" button is clicked
                                    if (isset($_REQUEST['getStudentFromSem']) && $_REQUEST['sem']) {
                                        $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);

                                        $studentQuery = "SELECT * FROM `student` WHERE sem='$sem'";//Selecting data on the basis of sem
                                        if ($studentResult = mysqli_query($conn, $studentQuery)) {
                                            $table = '
                                                <thead>
                                                    <tr>
                                                        <th>student Name</th>
                                                        <th>sem</th>
                                                        <th>sbrn</th>
                                                        <th>father Name</th>
                                                        <th>address</th>
                                                        <th>operation</th>
                                                    </tr>
                                                </thead>

                                                <tbody>';
                                            if (mysqli_num_rows($studentResult) > 0) {
                                                while ($studentRow = mysqli_fetch_assoc($studentResult)) {
                                                    $table .= "<tr>
                                                                <td>
                                                                    " . $studentRow['student_name'] . "
                                                                </td>
                                                                <td>
                                                                    " . $studentRow['sem'] . "
                                                                </td>
                                                                <td>
                                                                    " . $studentRow['sbrn'] . "
                                                                </td>
                                                                <td>
                                                                " . $studentRow['father_name'] . "
                                                                </td>
                                                                <td>
                                                                " . $studentRow['address'] . "
                                                                </td>
                                                                <td><a class='btn btn-primary'
                                                                        href='updateStudent.php?id=" . $studentRow['student_id'] . "&name=" . $studentRow['student_name'] . "&sem=" . $studentRow['sem'] . "&sbrn=" . $studentRow['sbrn'] . "&fname=" . $studentRow['father_name'] . "&address=" . $studentRow['address'] . "'>Update
                                                                        Data</a>
                                                                        </td>
                                                            </tr>";
                                                }
                                                $table .= "</tbody></table>";
                                            } else {
                                                $table .= "<tr><th colspan='6'>No Data For selected sem(" . $sem . ").</th></tr></tbody></table>";
                                            }
                                            echo $table;
                                        } else {
                                            echo "some error occured";
                                        }



                                    }
                                    ?>
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
    <script>
        $(document).ready(function () {
            $('button').click(function () {
                var sid = $(this).data('sid');//Getting student id
                var sname = $(this).data('sname');//Getting student name
                var sbrn = $(this).data('sbrn');//Getting student SBRN
                console.log(sid)
                $('#inputId').val(sid)//inserting into input of model
                $('#sname').append("<b>Name: " + sname + "<br>SBRN: " + sbrn + "</b>")
            })
        })
    </script>

    <?php require("toast.php"); ?>
</body>

</html>
<!-- Vertically centered modal -->
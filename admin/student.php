<?php
require("check.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Get status message 
if (!empty($_GET['status'])) {
    switch ($_GET['status']) {
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'student data has been imported successfully.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'Something went wrong, please try again.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Please upload a valid Excel file.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
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
    <script>
        function formToggle(ID) {
            var element = document.getElementById(ID);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>

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
                            <!-- Import link -->
                            <div>
                                    <a href="javascript:void(0);" class="btn btn-success"
                                        onclick="formToggle('importFrm');"><i class="plus"></i> Import Students From
                                        Excel</a>
                                </div>
                            <a class="btn btn-primary" href="./addStudent.php">Add new student</a>
                        </div>
                        <!-- Display status message -->
                        <?php if (!empty($statusMsg)) { ?>
                            <div class="col-xs-12 p-3">
                                <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
                            </div>
                        <?php } ?>
                        <div>
                            
                            <!-- Excel file upload form -->
                            <div class="col-md-12" id="importFrm" style="display: none;">
                                <form  action="./importData.php" method="post"
                                    enctype="multipart/form-data">
                                    <p class="text-danger">Only files with made in excel are allowed</p>
                                        <label for="fileInput" class="visually-hidden">Selcet File</label>
                                        <input type="file" class="form-control" name="file" id="fileInput" required
                                            accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                                    
                                    <br>
                                        <input type="submit" class="btn btn-primary mb-3" name="importStudent"
                                            value="Import">
                                </form>
                            </div>
                        </div>
                        <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                            <div class="controls">
                                <label for="sem">Semester</label>
                                <select name="sem" required="" id="sem">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
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
                                    if (isset($_REQUEST['getStudentFromSem']) && $_REQUEST['sem']) {
                                        $sem = mysqli_real_escape_string($conn, $_REQUEST['sem']);

                                        $studentQuery = "SELECT * FROM `student` WHERE sem='$sem'";
                                        if ($studentResult = mysqli_query($conn, $studentQuery)) {
                                            $table = '
                                                <thead>
                                                    <tr>
                                                        <th>student Name</th>
                                                        <th>sem</th>
                                                        <th>sbrn</th>
                                                        <th>father Name</th>
                                                        <th>address</th>
                                                        <th>operations</th>
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
                                                                    <br>
                                                                    <br>
                                                                    <button type='button' class='btn btn-danger' data-toggle='modal'
                                                                        data-target='#exampleModal'
                                                                        data-sid='" . $studentRow['student_id'] . "'data-sname='" . $studentRow['student_name'] . "'data-sbrn='" . $studentRow['sbrn'] . "'>Delete</button>
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
                        <p>Are you sure you want to delete the student?</p>
                        <input type="text" class="mb-1" name="id" id="inputId" value="" readonly>
                        <p id="sname"></p>
                        <div class="d-flex justify-content-between">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Don't
                                Delete</button>
                            <input type="submit" class="btn btn-danger" name="deleteStudent"
                                value="Yes, Delete Student">
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
                var sid = $(this).data('sid');
                var sname = $(this).data('sname');
                var sbrn = $(this).data('sbrn');
                console.log(sid)
                $('#inputId').val(sid)
                $('#sname').append("<b>Name: " + sname + "<br>SBRN: " + sbrn + "</b>")
            })
        })
    </script>
    <?php require("toast.php"); ?>
</body>

</html>
<!-- Vertically centered modal -->
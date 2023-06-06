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

    <title>Assign Subjects</title>

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
                            <h6 class="m-0 font-weight-bold text-primary">Subjects</h6>
                            <a class="btn btn-primary" href="./assignSubject.php">Assign subject</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Sem</th>
                                            <th>Teacher Assigned</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Sem</th>
                                            <th>Teacher Assigned</th>
                                            <th>Operations</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        /*Selecting data from assigned_teacher to get the subject and techer data*/
                                        $assignedQuery = "SELECT * FROM `assigned_teacher`";
                                        if ($assignedResult = mysqli_query($conn, $assignedQuery)) {
                                            while ($assignedRow = mysqli_fetch_assoc($assignedResult)) {

                                                ?>
                                                <tr>
                                                    
                                                        <?php
                                                        $subId = $assignedRow['subject_id'];
                                                        /*Selecting data from subject table about specific subject*/
                                                        $subjectQuery = "SELECT * FROM `subject` WHERE `subject_id`='$subId'";
                                                        if ($subjectResult = mysqli_query($conn, $subjectQuery)) {
                                                            $subject = mysqli_fetch_assoc($subjectResult);
                                                            echo "<td>".$subject['subject_name'] . " ( " . $subject['type'] . " )</td>";
                                                            echo "<td>".$subject['sem'] ."</td>";
                                                        }
                                                        ?>
                                                    <td>
                                                        <?php
                                                        $teacherId = $assignedRow['teacher_id'];
                                                        /*Selecting data from user table about specific teacher*/
                                                        $teacherQuery = "SELECT * FROM `user` WHERE `id`='$teacherId'";
                                                        if ($teacherResult = mysqli_query($conn, $teacherQuery)) {
                                                            $teacher = mysqli_fetch_assoc($teacherResult);
                                                            echo $teacher['name'];
                                                        }
                                                        ?>
                                                    </td><!--Link to queries.php for deleting subject-->
                                                    <td>
                                                        <button type='button' class='btn btn-danger' data-toggle='modal'
                                                            data-target='#exampleModal'
                                                            data-subjectid='<?php echo $subId; ?>'>Unassign</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Un Assigning Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="queries.php" method="POST">
                        <p>Are you sure you want to un assign the subject from teacher? It may result in confict with
                            attendance table if already created.</p>
                        <input type="text" class="mb-1" name="deleteSubId" id="inputId" value="" readonly>
                        <p id="sname"></p>
                        <div class="d-flex justify-content-between">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Don't
                                un assign</button>
                            <input type="submit" class="btn btn-danger" value="Yes,Un assign subject">
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
                var sid = $(this).data('subjectid');
                console.log(sid)
                $('#inputId').val(sid)
            })
        })
    </script>
    <?php require("toast.php"); ?>
</body>

</html>
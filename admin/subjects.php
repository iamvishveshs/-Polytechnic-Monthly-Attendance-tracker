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
            $statusMsg = 'subject data has been imported successfully.';
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

    <title>Subjects</title>

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
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Subjects</h6>
                            
                            <div >
                                <a href="javascript:void(0);" class="btn btn-success"
                                    onclick="formToggle('importFrm');"><i class="plus"></i> Import Subjects From
                                    Excel</a>
                            </div>
                            <a class="btn btn-primary" href="./addSubject.php">Add new subject</a>
                        </div>
                        <!-- Display status message -->
                    <?php if (!empty($statusMsg)) { ?>
                        <div class="col-xs-12 p-3">

                            <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
                        </div>
                    <?php } ?>
                    <div>
                        <!-- Import link -->
                        
                        <!-- Excel file upload form -->
                        <div class="col-md-12" id="importFrm" style="display: none;">
                            <form action="./importData.php" method="post" enctype="multipart/form-data">
                                <p class="text-danger">Only files with made in excel are allowed</p>
                                <label for="fileInput" class="visually-hidden">Selcet File</label>
                                <input type="file" class="form-control" name="file" id="fileInput" required
                                    accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />

                                <br>
                                <input type="submit" class="btn btn-primary mb-3" name="importSubject" value="Import">
                            </form>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Semester</th>
                                            <th>Type</th>
                                            <th>Scheme</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $subjectQuery = "SELECT * FROM `subject` ORDER BY `sem`";
                                        if ($subjectResult = mysqli_query($conn, $subjectQuery)) {
                                            while ($subjectRow = mysqli_fetch_assoc($subjectResult)) {

                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $subjectRow['subject_name']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $subjectRow['sem']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $subjectRow['type']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $subjectRow['scheme']; ?>
                                                    </td>
                                                    <td><a class="btn btn-primary"
                                                            href="updateSubject.php?id=<?php echo $subjectRow['subject_id']; ?>&name=<?php echo $subjectRow['subject_name']; ?>&sem=<?php echo $subjectRow['sem']; ?>&type=<?php echo $subjectRow['type']; ?>&scheme=<?php echo $subjectRow['scheme']; ?>">Update
                                                            Subject</a>
                                                        <br><br><button type='button' class='btn btn-danger' data-toggle='modal'
                                                            data-target='#exampleModal' data-sid=<?php echo $subjectRow['subject_id']; ?>>Delete
                                                            Subject</button>
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
                        <p>Are you sure you want to delete the subject?</p>
                        <input type="text" class="mb-1" name="id" id="inputId" value="" readonly>
                        <div class="d-flex justify-content-between">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Don't
                                Delete</button>
                            <input type="submit" class="btn btn-danger" name="deleteSubject"
                                value="Yes, Delete subject">
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
                $('#inputId').val(sid)
            })
        })
    </script>
    <?php require("toast.php"); ?>
</body>

</html>
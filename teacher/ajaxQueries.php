<?php
require("check.php");
/* to get the assigned subjects of a teacher using semester and scheme */

if ($_REQUEST['name'] == "ShowSubjects") {
    $op1 = $_REQUEST['sem'];
    $op2 = $_REQUEST['scheme'];
    $teacherId = $_SESSION["teacherId"];
    $arr = '';
    $assignSubject = "SELECT  * from `subject` INNER JOIN `assigned_teacher` ON subject.subject_id=assigned_teacher.subject_id  WHERE assigned_teacher.teacher_id = '$teacherId' AND scheme='$op2' AND sem='$op1'";
    if ($result = mysqli_query($conn, $assignSubject)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $arr .= '<option value="' . $row['subject_id'] . '">' . $row['subject_name'] . ' (' . $row['type'] . ' )</option>';
            }
        } else {
            $arr .= '<option value="">No data</option>';
        }
    }
    echo ($arr);
}

/* to get the students details on addAttendance.php page for adding the attendance*/

if ($_REQUEST['name'] == "addAttendance") {
    $op1 = $_REQUEST['sem'];
    $op2 = $_REQUEST['subject'];
    $op3 = $_REQUEST['scheme'];
    $op4 = $_REQUEST['total'];
    $sem = $_REQUEST['sem'];
    $tableName = "attendance" . $sem . "thsem";
    $result = mysqli_query($conn, "SHOW TABLES LIKE '" . $tableName . "'");
    $tableExist = mysqli_num_rows($result) > 0;
    /*Checking if the table exists*/
    if ($tableExist) {
        if ($_REQUEST['subject'] == null) {
            echo '<br><div class="alert alert-danger" role="alert">
            Select any subject to continue.
            <a class="text-primary" onclick="loadSubject()">Click to load subjects</a>
        </div>';
        } else {
            $arr = '<br><div class="alert alert-danger" role="alert">
            After any changes click the button below to save attendance.
        </div><div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>student Name</th>
                                                    <th>sbrn</th>
                                                    <th>Total classes</th>
                                                    <th>Attended Classes</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>student Name</th>
                                                    <th>sbrn</th>
                                                    <th>Total classes</th>
                                                    <th>Attended Classes</th>
                                                    
                                                </tr>
                                            </tfoot>
                                            <tbody>';
            $assignSubject = "SELECT  * from `student` WHERE sem='$op1' ORDER BY student_id ASC";
            if ($result = mysqli_query($conn, $assignSubject)) {
                if (mysqli_num_rows($result) > 0) {
                    $i=0;
                    while ($row = mysqli_fetch_array($result)) {
                        $arr .= ' <tr>
                                                    <td><input type"text" name="studentId[]" value="' . $row['student_id'] . '" hidden>' . $row['student_name'] . ' </td>
                                                    <td>' . $row['sbrn'] . '</td>
                                                    <td><input type"text" name="totalclasses[]" value="' . $op4 . '" class="classesS['.$i.']" id="S['.$i.']" pattern="[0-9.]+" title="only numbers are allowed [0-9]" oninput="checkClasses(this.id)" required><br>
                                                    <span class="alertC['.$i.'] text-danger"></span></td>
                                                    <td><input type"text" name="attendedclasses[]" class="attendedS['.$i.']" id="S['.$i.']" pattern="[0-9.]+" title="only numbers are allowed [0-9]" oninput="checkAttended(this.id)" required><br>
                                                    <span class="alertS['.$i.'] text-danger"></span></td>
                                                
                                                </tr>';
                                                $i=$i+1;
                    }
                    $arr .= "</tbody></table></div>
                    <input type='submit' class='btn btn-primary' value='Submit Attendance' name='addAttendance'>";
                } else {
                    $arr = '<div>No data</div>';
                }
            }
            echo ($arr);
        }
    } else {
        echo '<br><div class="alert alert-danger" role="alert">
        <b>NOTICE:</b>Table does not Exists with name ' . $tableName . '. <br>Ask the admin to create table for sem ' . $sem . '
      </div>';
    }
}

/* to see the attendance on "getAttendance.php"*/

if ($_REQUEST['name'] == "showAttendance") {
    $sem = $_REQUEST['sem'];
    $subjectId = $_REQUEST['subject'];
    $op3 = $_REQUEST['scheme'];
    $tableName = "attendance" . $sem . "thsem";
    $result = mysqli_query($conn, "SHOW TABLES LIKE '" . $tableName . "'");
    $tableExist = mysqli_num_rows($result) > 0;
    /*Checking if the table exists*/
    if ($tableExist) {
        if ($_REQUEST['subject'] == null) {
            echo '<br><div class="alert alert-danger" role="alert">
            Select any subject to continue.
            <a class="text-primary" onclick="loadSubject()">Click to load subjects</a>
        </div>';
        } else {
            $arr = '<br><div class="alert alert-danger" role="alert">
            After any changes click the button below to save attendance.
        </div><div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>student Name</th>
                                                    <th>sbrn</th>
                                                    <th>Total classes</th>
                                                    <th>Attended Classes</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>student Name</th>
                                                    <th>sbrn</th>
                                                    <th>Total classes</th>
                                                    <th>Attended Classes</th>
                                                    
                                                </tr>
                                            </tfoot>
                                            <tbody>';
            $tableName = "Attendance" . $sem . "thSem";
            $subject = "s" . $subjectId . "";
            $getAttendance = "SELECT  * from `" . $tableName . "` INNER JOIN `student` ON " . $tableName . ".student_id=student.student_id";
            $ifNull = 0;
            if ($result = mysqli_query($conn, $getAttendance)) {

                if (mysqli_num_rows($result) > 0) {
                    $i=0;
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row[$subject] == NULL) {
                            $ifNull = 1;
                            $arr = '<br><div class="alert alert-danger" role="alert">
                            <b>NOTICE:</b>Please add attendance first from <a class="text-primary" href="./addAttendance.php">Here</a> to View and update it 
                          </div>';
                        } else {
                            $attendance = explode("/", $row[$subject]);
                            $arr .= ' <tr>
                            <td><input type"text" name="studentId[]" value="' . $row['student_id'] . '" hidden>' . $row['student_name'] . ' </td>
                            <td>' . $row['sbrn'] . '</td>
                            <td><input type"text" name="totalclasses[]" value="' . $attendance[0] . '"  class="classesS['.$i.']" id="S['.$i.']" pattern="[0-9.]+" title="only numbers are allowed [0-9]" oninput="checkClasses(this.id)" required><br>
                            <span class="alertC['.$i.'] text-danger"></span></td></td>
                            <td><input type"text" name="attendedclasses[]" value="' . $attendance[1] . '"  class="attendedS['.$i.']" id="S['.$i.']" pattern="[0-9.]+" title="only numbers are allowed [0-9]" oninput="checkAttended(this.id)" required><br>
                            <span class="alertS['.$i.'] text-danger"></span></td>
                                                    
                                                    </tr>';
                        }
                        
                        $i=$i+1;
                    }
                    if ($ifNull == 0) {
                        $arr .= "</tbody></table></div><input type='submit' class='btn btn-danger' value='Save Changes' name='changeAttendance'>";
                    }
                } else {
                    $arr = '<br><div>No data</div>';
                }
            }
            echo ($arr);
        }
    } else {
        echo '<br><div class="alert alert-danger" role="alert">
        <b>NOTICE:</b>Table does not Exists with name ' . $tableName . '. <br>Ask the admin to create table for sem ' . $sem . '
      </div>';
    }
}

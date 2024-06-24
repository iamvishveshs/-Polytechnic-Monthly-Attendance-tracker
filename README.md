# Monthly attendance tracker
## _Developed by Vishvesh Shivam_

### Project Overview:  College Attendance Tracker

This project aims to assist  colleges in efficiently tracking and managing student attendance on a monthly basis. It provides an automated solution to generate attendance reports, ensuring that students' attendance is monitored and necessary actions can be taken for those with low attendance.

![App Screenshot](https://github.com/iamvishveshs/iamvishveshs.github.io/blob/main/assets/jpeg/monthly-attendance-tracker.jpg?raw=true)

### Features

1. **Monthly Attendance Tracking**:
   - Keeps a record of student attendance for each month.

2. **Report Generation**:
   - Generates attendance reports in PDF format for easy sharing and printing.

3. **Highlighting Low Attendance**:
   - Students with attendance below 75% are automatically highlighted in the report, making it easy to identify those who may need intervention.

4. **Divided Attendance Sections**:
   - Attendance is categorized into two sections:
     - **Theory**: Tracks attendance for theoretical classes.
     - **Practical**: Tracks attendance for practical/laboratory sessions.

### Benefits

- **Efficiency**: Automates the tracking and reporting process, saving time and reducing errors associated with manual attendance management.
- **Transparency**: Provides clear and easily accessible records of student attendance.
- **Proactivity**: Helps identify students with low attendance promptly, allowing for timely interventions.

### Implementation Details

1. **Data Input**:
   - Attendance data can be input manually or imported from existing systems.
   - Separate inputs for Theory and Practical classes.

2. **Attendance Calculation**:
   - Attendance percentage is calculated separately for Theory and Practical sections.
   - Overall attendance is computed based on both sections.

3. **PDF Report Generation**:
   - The system generates a comprehensive attendance report in PDF format.
   - Reports include detailed attendance records and highlight students below the 75% threshold.

4. **User Interface**:
   - Simple and intuitive interface for data entry and report generation.
   - Options to filter and view attendance records by class, section, or individual students.

### Workflow

1. **Data Collection**:
   - Collect attendance data from class registers or electronic systems.
   - Input data into the system, specifying Theory and Practical classes.

2. **Processing**:
   - The system processes the data, calculating attendance percentages.
   - Identifies students below the 75% attendance threshold.

3. **Report Generation**:
   - Generates a detailed PDF report of attendance records.
   - Highlights students with low attendance.

4. **Review and Action**:
   - Teachers and administrators review the report.
   - Take necessary actions for students with low attendance (e.g., counseling, parent meetings).


## Tech Stack

**Client:** HTML, CSS, Bootstrap, Javascript, Jquery

**Server:** PHP

**Database:** MySQL 


## Database Configuration

#### Config areas
change these files to run the website smoothly

`/login/db.php`
`/admin/db.php`
`/classTeacher/db.php`
`/teacher/db.php`


| Key | value     | 
| :-------- | :------- | 
| `$servername` | `MySQL Hostname e.g. localhost` | 
| `$username` | `MySQL username e.g root` |
| `$password` | `MySQL password` |
| `$db` | `ams` |


## User Authentication

#### Demo Accounts


| Role | Email     | Password                |
| :-------- | :------- | :------------------------- |
| `Admin` | `admin@gmail.com` |  `admin`|
| `Class Teacher` | `teacher1@gmail.com` |  `admin`|
| `Teacher` | `teacher2@gmail.com` |  `admin`|

#### Note:

To use the `Forgot password` functinality 
  Create a **New account** by logging into admin panel
  ```admin
  https://yoursite.com/admin
  ```
```
Add new teacher (Fill details) 
```
Also change the credentials in `/login/reset-password.php`

| Key | Value     | 
| :-------- | :------- |
| `$mail->Username` | `Your Email Address` | 
| `$mail->Password` | `generate app password from google account` |

go to gmail and generate app password here 
https://myaccount.google.com/apppasswords

### Conclusion

The College Attendance Tracker is a comprehensive tool designed to streamline the process of attendance tracking and management. By generating detailed, actionable reports and highlighting students with attendance issues, it supports educational institutions in maintaining high standards of attendance and academic performance.

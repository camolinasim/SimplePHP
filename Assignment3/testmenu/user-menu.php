<!--
/**
 * CS 4342 Database Management
 * @author A Gandara (taken from Instruction Team Fall 2020 - Garnica)
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: 
 */
-->

<?php

    function displayTable($tbl){
        $sql = "SELECT * FROM " . $tbl . ";";

        $conn = $GLOBALS['conn'];
        if ($result = $conn->query($sql)) {
            echo "<h4 style='text-align:center;'>" .  $tbl .  " Data </h4>";

            echo "<table class='center' border=1 width=75%>
                           <tr> ";
            $finfo = $result->fetch_fields();

            foreach ($finfo as $val) {
                echo "<th style='text-align:center;'>". $val->name . "</th>";
            }
            echo "</tr>";

            while($row = $result->fetch_row()){
                echo "<tr>";
                foreach ($row as $value){
                    echo "<td style='text-align:center;'>".$value."</td>";
                }
                echo "</tr>";
            }

            echo "</table> <br><br> ";
        }
    }

    function displayProjectWithDerived(){
        $tbl = "PROJECT";
        $sql = "SELECT project.*,(CASE WHEN (Pend_date IS NULL) THEN DATEDIFF(CURDATE(),Pstart_date) ELSE DATEDIFF(Pend_date,Pstart_date) END) AS Active_time FROM " . $tbl . ";";

        $conn = $GLOBALS['conn'];
        if ($result = $conn->query($sql)) {
            echo "<h4 style='text-align:center;'>" .  $tbl .  " Data </h4>";

            echo "<table class='center' border=1 width=75%>
                           <tr> ";
            $finfo = $result->fetch_fields();

            foreach ($finfo as $val) {
                echo "<th style='text-align:center;'>". $val->name . "</th>";
            }
            echo "</tr>";

            while($row = $result->fetch_row()){
                echo "<tr>";
                foreach ($row as $value){
                    echo "<td style='text-align:center;'>".$value."</td>";
                }
                echo "</tr>";
            }

            echo "</table> <br><br> ";
        }
    }

?>

<!doctype html>
<html lang="en">
<!-- we will use a style shee to control the look and feel - style sheets introduce formatting styles that can 
be added to your interface -->
<link rel="stylesheet" href="css/style.css">
<!-- Bootstrap CSS library https://getbootstrap.com/ - you can also layer stylesheets and reuse style sheets from other sources -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CS DB PHP Menu</title>


</head>

<body>
  <div style="margin-top: 20px" class="container">
    
    <h1 class="center">Home Menu Page</h1>
  <!-- setup a menubar -->
  <div class="topnav">
    <a class="active" href="user-menu.php">Home</a>
    <a href="pi.php">PI Table</a>
    <a href="project.php">Project Table</a>
    <a href="student.php">Student Table</a>
    <a href="grad.php">Grad Table</a>
    <a href="ug.php">Undergrad Table</a>
    <a href="joins.php">Grad Joins Table</a>
    <a href="works.php">Works Table</a>
    <a href="authors.php">Co-Authors Table</a>
    <a href="active.php">Active Projects</a>
    <a href="ug-pi-proj.php">UG Student Proj w/ PI</a>
    <a href="ps6.php">PS6 Students</a>
    <a href="proj-stud.php">Proj and Student</a>
    <a href="report.php">Report</a>
    <a href="about.php">About</a>
    <a href="../index.php">Logout</a>
  </div>

    <?php 

      session_start();
      require_once('../validate_session.php');
       /** import the code to create the db connection object */
      require_once('../config.php');
      /** default look of the page **/
    displayTable("PI");
    displayProjectWithDerived();
    displayTable("STUDENT");
    displayTable("GRAD_STUDENT");
    displayTable("UG_STUDENT");
    displayTable("GRAD_JOINS");
    displayTable("WORKS");
    displayTable("CO_AUTHORS");
    displayTable("CREATES");
    ?>
    
  </div>

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>


<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 * Include your name here - ex. Modified by Villanueva for Assignment 3
 */
-->

<?php

    function displayTable( $tbl){
        $sql = "SELECT * FROM " . $tbl . ";";

        $conn = $GLOBALS['conn'];
        if ($result = $conn->query($sql)) {
            echo "<h1 class='center'>" .  $tbl .  " data </h1>";
            echo "<table class='center' border=1 width=50%>
                <tr>
                    <th> ID</th>
                    <th> First Name</th>
                    <th> Middle Name</th>
                    <th> Last name </th>
                </tr>
               ";

            while ($row = $result->fetch_row()) {
                echo "<tr><td>" . $row[0] . "</td>
                        <td>" .  $row[1] .  "</td>
                        <td>" .  $row[2] . "</td>
                        <td>" . $row[3] .  "</td>
                    </tr>";
            }

            echo "</table> <br><br> ";
        }
    }

    function display_data($data) {
$output = '<table>';
foreach($data as $key => $var) {
    $output .= '<tr>';
    foreach($var as $k => $v) {
        if ($key === 0) {
            $output .= '<td><strong>' . $k . '</strong></td>';
        } else {
            $output .= '<td>' . $v . '</td>';
        }
    }
    $output .= '</tr>';
}
$output .= '</table>';
echo $output;

?>

<!doctype html>
<html lang="en">
<style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CS 4342 Simple PHP</title>

  <!-- Bootstrap CSS library https://getbootstrap.com/ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
  <div style="margin-top: 20px" class="container">

    <h1 class="center">Simple PHP Screen</h1>
    <!--- this file connects to the database -->

    <?php
      require_once('config.php');

      displayTable("student");
      display_data("student");

    ?>

  </div>

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>

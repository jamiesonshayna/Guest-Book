<?php
    //Turn on error reporting -- this is critical!
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE html>
<!--
Author: Shayna
Date: 19-11-30
File Name: admin_page.php
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <!-- For the icon in the tab -->
    <!-- https://favicon.io/emoji-favicons/fallen-leaf/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">

    <title>Guest Book | Admin</title>
</head>
<body>

<div class="jumbotron jumbotron-fluid" id="jumbo">
    <div class="container">
        <h1 class="display-4">Guest Book | ADMIN</h1>
    </div>
</div> <!-- end of jumbotron-->

<div id="table-container">

    <h3>Student Summary</h3>

    <?php
    //require('/home/sjamieso/connect-guestbook.php');
    require('private/connect-guestbook.php');
    //Define the query
    $sql = 'SELECT * FROM User;';
    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    ?>

    <table data-order='[[8, "desc"]]' id="guestbook-table" class="display">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Company</th>
            <th>Linked In</th>
            <th>Email</th>
            <th>Mailing List</th>
            <th>Email Format</th>
            <th>Comments</th>
            <th>How We Met</th>
            <th>Date Joined</th>
        </tr>
        </thead>
        <tbody>

        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['user_title']} {$row['user_first']} {$row['user_last']}</td>
                <td>{$row['user_company']}</td>
                <td>{$row['user_linked_in']}</td>
                <td>{$row['user_email']}</td>
                <td>{$row['user_mailing']}</td>
                <td>{$row['user_email-format']}</td>
                <td>{$row['user_comment']}</td>
                <td>{$row['user_how_we_met']}</td>
                <td>{$row['user_date_joined']}</td>
              </tr>";
            // example of how to convert dates in PHP !!! String format
//          //                $birthdate = date('m-d-Y', strtotime($row[birthdate'));
        }
        ?>

        </tbody>
    </table>

</div> <!-- end of div that encases all of the body contend (for margin and padding) -->


<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
    //$('#guestbook-table').DataTable();

    $('#guestbook-table').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
</script>
</body>
</html>


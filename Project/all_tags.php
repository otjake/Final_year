<?php
include("includes/header.php");

tag_upload_form();

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">ALL REGISTERED CARD</li>
            </ol>
            <?php
            //ALERT MESSAGES USING URL STRPOS
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($fullUrl, "dmessage=error") == TRUE) {

                echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"all_tags.php\" class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
            } elseif (strpos($fullUrl, "dmessage=correct") == TRUE) {

                echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='all_tags.php' class='close'>&times;</a>Card Deactivated</div>";
            }

 if (strpos($fullUrl, "Umessage=error") == TRUE) {

                echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"all_tags.php\" class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
            } elseif (strpos($fullUrl, "Umessage=correct") == TRUE) {

                echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='all_tags.php' class='close'>&times;</a>Card Updated successfully</div>";
            }



            ?>



            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DETAILS TABLE</div>
                <div class="card-body">
                    <table id="all_tags" class="display tables" style="width:100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>TAG NO</th>
                            <th>MATRIC NO</th>
                            <th>NAME</th>
                            <th>ACTIONS</th>

                        </tr>
                        </thead>
                        <tbody>
<?php
                        global $connection;
                        $sql = "SELECT * FROM masters_tb";
                        $squery_result = mysqli_query($connection, $sql);
                        if ($squery_result->num_rows > 0) {
                            $i = 1;
                            while ($row =  mysqli_fetch_array($squery_result)) {
                                $id = $row['master_id'];

                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" . $row['tag'] . "</td>";
                                echo "<td>" . $row['student_id'] . "</td>";
                                echo "<td>" . $row['Firstname'] . " " . $row['Lastname'] . "</td>";
                                echo "<td>";

//                                echo "<a href='access_record.php?id=" . $row['master_id'] . "' class='btn btn-info' style='margin-right: 1em'>Records</a>";

                                //to update only one record
                                echo "<a href='update_tag.php?master_id=" . $row['master_id'] . "' class='btn btn-primary' style='margin-right: 1em'>Edit<a/>";
                                //to delete only one record
//                                echo "<a href='delete_tag.php?id=" . $row['master_id'] . "' class='btn btn-danger'>Delete</a>";
                                echo "<a href='#' onclick='delete_tag({$id})'  class='btn btn-danger 'style='margin-left:1rem;'>Deactivate</a>";
                                echo "</td>";
                                echo "</tr>";

}
                        }
 ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>TAG NO</th>
                            <th>MATRIC NO</th>
                            <th>NAME</th>
                            <th>ACTIONS</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </main>

    <script type='text/javascript'>

        // $(document).ready(function() {
        //     $('#all_tags').DataTable();
        // } );
        // confirm record deletion
        function delete_tag(id) {

            var answer = confirm('Are you sure?');
            if (answer) {

                window.location = 'delete_tag.php?id=' + id;
            }
        }
    </script>

    <script>
        $(document).ready(function() {


                // $('#example').DataTable();

            //jquery function to show alert using the submit button
            $('#upload').click(function() {
                $('#ealert').show('fade');

                //jquery function to close alert within 2 seconds
                setTimeout(function() {
                    $('#ealert').hide('fade');
                }, 2000);
            });
            //jquery function to close alert using the cross button
            $('#linkClose').click(function() {
                $('#ealert').hide('fade');
            });
        });



        $(document).ready(function() {
            //jquery function to show alert using the submit button
            $('#upload').click(function() {
                $('#alert').show('fade');

                //jquery function to close alert within 2 seconds
                setTimeout(function() {
                    $('#salert').hide('fade');
                }, 2000);
            });
            //jquery function to close alert using the cross button
            $('#linkClose').click(function() {
                $('#salert').hide('fade');
            });
        });
    </script>
    <?php include("includes/footer.php"); ?>
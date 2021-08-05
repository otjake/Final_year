<?php
include("includes/header.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">ALL CARD USAGE</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>ACCESS TIME TABLE</div>
                <div class="card-body">
                    <table id="access_records" class="display tables" style="width:100%">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>NAME</th>
                            <th>TAG ID</th>
                            <th>DATE</th>
<!--                            <th>ACTIONS</th>-->

                        </tr>
                        </thead>
                        <tbody>
<?php
                        global $connection;
                        $sql = "SELECT * FROM access_record";
                        $squery_result = mysqli_query($connection, $sql);
                        if ($squery_result->num_rows > 0) {
                            $i = 1;
                            while ($row =  mysqli_fetch_array($squery_result)) {
                                $test=$row['master_id'];
                                $sqlR = "SELECT * FROM masters_tb WHERE master_id =  $test ";
                                $squery_resultR = mysqli_query($connection, $sqlR);
                                $rowR =  mysqli_fetch_array($squery_resultR);


                                $id = $row['access_id'];

                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" . $rowR['Firstname'] . " " . $rowR['Lastname'] . "</td>";
                                echo "<td>" . $row['rfid_ref'] . "</td>";
                                echo "<td>" . $row['access_time'] . "</td>";
                                echo "<td>";

//                                echo "<a href='access_record.php?id=" . $row['access_id'] . "' class='btn btn-info' style='margin-right: 1em'>Records</a>";
                                echo "</td>";
                                echo "</tr>";

}
                        }
 ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>NAME</th>
                            <th>TAG ID</th>
                            <th>DATE</th>
<!--                            <th>ACTIONS</th>-->
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </main>


    <?php include("includes/footer.php"); ?>
<?php
include("includes/header.php");

bmi_upload_form();


?>

<div id="layoutSidenav_content">

    <main>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">WE CURRENTLY HAVE <?php

                                                $tags_query = "SELECT * FROM bmi";
                                                $tags_result = mysqli_query($connection, $tags_query);                                                                        //counting the rows
                                                $count = mysqli_num_rows($tags_result);
                                                if ($count > 0) {
                                                    echo $count;
                                                } else {
                                                    echo NULL;
                                                }
                                                ?> SAVED BMI'S</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="all_tags.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Tag Details</li>
            </ol>
            <?php
            if (!empty($Smessage)) {
                echo "<p class='alert alert-success'> $Smessage </p>";
            }
            if (!empty($Emessage)) {
                echo "<p class='alert alert-danger'> $Emessage </p>";
            }
            if (!empty($Emmessage)) {
                echo "<p class='alert alert-danger'> $Emmessage </p>";
            }
            if (!empty($double_code_message)) {
                echo "<p class='alert alert-danger'> $double_code_message </p>";
            }

            ?>

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>New Entry</div>
                <div class="card-body">

                    <form method="POST" action="medical.php">


                        <div class="form-group">
                            <b>TAG:
                                <input type="text" class="form-control" name="tag" placeholder="Tag ID" />
                            </b>
                        </div>
                        <div class="form-group">
                            <b>HEIGHT:
                                <input type="text" class="form-control" name="height" placeholder="Student height" required />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>WEIGHT:
                                <input type="text" class="form-control" name="weight" placeholder="Student weight" required />

                            </b>
                        </div>


                        <button type="submit" id="upload" name="uploadM" class="btn btn-primary">Upload</button>
                        <a href="all_tags.php" class="btn btn-info">View all records</a>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
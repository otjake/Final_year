<?php
include("includes/header.php");

tag_upload_form();


?>

<div id="layoutSidenav_content">

    <main>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">WE CURRENTLY HAVE <?php

                                                $tags_query = "SELECT * FROM masters_tb";
                                                $tags_result = mysqli_query($connection, $tags_query);                                                                        //counting the rows
                                                $count = mysqli_num_rows($tags_result);
                                                if ($count > 0) {
                                                    echo $count;
                                                } else {
                                                    echo NULL;
                                                }
                                                ?> TAG(S) REGISTERED</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="all_tags.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add new Records</li>
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

                    <form method="POST" action="index.php">

                        <div class="form-group">
                            <b>TAG:
                                <input type="text" class="form-control" name="tag" placeholder="Tag ID" />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>STUDENT MATRIC NUMBER:
                                <input type="text" class="form-control" name="matric" placeholder="Matric No." />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>FIRST NAME:
                                <input type="text" class="form-control" name="fname" placeholder="First Name" required />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>LAST NAME:
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" required />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>SCHOOL:
                                <input type="text" class="form-control" name="school" placeholder="School of" required />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>DEPARTMENT:
                                <input type="text" class="form-control" name="dept" placeholder="Department" required />

                            </b>
                        </div>
                        <div class="form-group">
                            <b>GENDER:
                                <input type="text" class="form-control" name="gender" placeholder="Enter student gender" required />

                            </b>
                        </div>
<!--                        <div class="form-group">-->
<!--                            <b>DATE:-->
<!--                                <input type="date" class="form-control " name="date" placeholder="format-:27 november,2007" />-->
<!--                            </b>-->
<!--                        </div>-->


                        <button type="submit" id="upload" name="uploadT" class="btn btn-primary">Upload</button>
                        <a href="all_tags.php" class="btn btn-info">View all records</a>

                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include("includes/footer.php"); ?>
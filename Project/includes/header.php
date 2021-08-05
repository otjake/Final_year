<?php
ob_start();
session_start();
include("includes/db.php");
include("includes/functions.php");

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script type='text/javascript'>

        $(document).ready(function() {
                $('.tables').DataTable();
            }
        );

    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TAG MANAGEMENT</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->

        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="Admin_logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                            NEW ENTRY
                        </a>
                        <a class="nav-link" href="all_tags.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            ALL USERS
                        </a>

                        <a class="nav-link" href="access_records.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-microphone-alt"></i></div>
                            ACCESS RECORDS
                        </a>
                        <a class="nav-link" href="register_admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                            ADD ADMIN
                        </a>
                        <a class="nav-link collapsed" href="rfid.py" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            READER
                        </a>
<!--                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">-->
<!--                            <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="review.php">REVIEW MANAGEMENT</a><a class="nav-link" href="newsletter.php"> NEWSLETTER</a></nav>-->
<!--                        </div>-->
<!--                        <a class="nav-link collapsed" href="transaction_details.php">-->
<!--                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>-->
<!--                            TRANSACTION DETAILS-->
<!--                        </a>-->
                        <a class="nav-link text-danger collapsed" href="Admin_logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-solid fa-door-open"></i></div>
                            LOG OUT
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:<?php echo $_SESSION['username']; ?></div>

                </div>
            </nav>
        </div>
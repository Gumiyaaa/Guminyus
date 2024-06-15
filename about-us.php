<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Guminyus | About us</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom styles for About Us page -->
    <style>
        .breadcrumb {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 10px 15px;
        }

        .breadcrumb a {
            color: #343a40;
        }

        .breadcrumb a:hover {
            text-decoration: none;
            color: #007bff;
        }

        .about-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .about-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .about-content {
            font-size: 1.1rem;
            line-height: 1.7;
            text-align: justify;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">
        <?php 
        $pagetype='aboutus';
        $query=mysqli_query($con,"SELECT PageTitle, Description FROM tblpages WHERE PageName='$pagetype'");
        while($row=mysqli_fetch_array($query)) {
        ?>
        <div class="about-header">
            <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle']); ?></h1>
        </div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">About</li>
        </ol>

        <!-- Intro Content -->
        <div class="row">
            <div class="col-lg-12 about-content">
                <p><?php echo $row['Description']; ?></p>
            </div>
        </div>
        <!-- /.row -->
        <?php } ?>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

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
    <title>Guminyus | Contact Us</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom CSS for Contact page -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 20px;
        }

        .breadcrumb .breadcrumb-item {
            font-size: 14px;
            color: #666;
        }

        .breadcrumb .breadcrumb-item a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb .breadcrumb-item a:hover {
            color: #0056b3;
        }

        .intro-section {
            margin-top: 30px;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .intro-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }

        .intro-section p {
            font-size: 18px;
            line-height: 1.6;
            color: #666;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <?php 
        $pagetype='contactus';
        $query=mysqli_query($con,"select PageTitle, Description from tblpages where PageName='$pagetype'");
        while($row=mysqli_fetch_array($query)) {
        ?>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>

        <!-- Intro Section -->
        <div class="row intro-section">
            <div class="col-lg-12">
                <p><?php echo $row['Description'];?></p>
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

<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Guminyus | Search Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom styles for search page -->
    <style>
        .card {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #343a40;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .pagination .page-link:hover {
            color: #fff;
            background-color: #343a40;
            border-color: #343a40;
        }

        .pagination .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #343a40;
            border-color: #343a40;
        }

        /* Custom styles for Read More button */
        .btn-read-more {
            background-color: #000;
            border-color: #000;
            color: #fff;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }

        .btn-read-more:hover {
            background-color: #333;
            border-color: #333;
            color: #fff;
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row" style="margin-top: 4%">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                <?php 
                if(isset($_POST['searchtitle'])){
                    $st = $_POST['searchtitle'];
                    $_SESSION['searchtitle'] = $st;
                } else if(isset($_SESSION['searchtitle'])){
                    $st = $_SESSION['searchtitle'];
                } else {
                    $st = '';
                }

                if(isset($_GET['pageno'])){
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }

                $no_of_records_per_page = 8;
                $offset = ($pageno - 1) * $no_of_records_per_page;

                $total_pages_sql = "SELECT COUNT(*) FROM tblposts WHERE PostTitle LIKE '%$st%' AND Is_Active=1";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                $query = mysqli_query($con, "SELECT tblposts.id AS pid, tblposts.PostTitle AS posttitle, tblcategory.CategoryName AS category, tblsubcategory.Subcategory AS subcategory, tblposts.PostDetails AS postdetails, tblposts.PostingDate AS postingdate, tblposts.PostUrl AS url FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId=tblposts.SubCategoryId WHERE tblposts.PostTitle LIKE '%$st%' AND tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");

                $rowcount = mysqli_num_rows($query);
                if($rowcount == 0){
                    echo "<div class='alert alert-danger'>No record found</div>";
                } else {
                    while($row = mysqli_fetch_array($query)){
                ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
                        <a href="news-details.php?nid=<?php echo htmlentities($row['pid']); ?>" class="btn btn-read-more">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on <?php echo htmlentities($row['postingdate']); ?>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="page-link">Next</a>
                    </li>
                    <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                </ul>
            </div>

            <!-- Sidebar Widgets Column -->
            <?php include('includes/sidebar.php'); ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

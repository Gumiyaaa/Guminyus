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
    <title>Guminyus | Category Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        /* Custom button style */
        .btn-read-more {
            background-color: black;
            border-color: black;
            color: white;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: all 0.3s ease-in-out;
        }
        .btn-read-more:hover {
            background-color: #333;
            border-color: #333;
            color: white;
            transform: scale(1.05);
        }

        /* Custom card body style */
        .card-body h2 {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 1.75rem;
            font-weight: bold;
        }
        .card-body p {
            font-size: 1rem;
            color: #6c757d;
        }

        /* Custom card footer style */
        .card-footer {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Pagination style */
        .pagination .page-link {
            color: black;
        }
        .pagination .page-item.active .page-link {
            background-color: black;
            border-color: black;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row mt-4">
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Category Title -->
                <?php 
                if ($_GET['catid'] != '') {
                    $_SESSION['catid'] = intval($_GET['catid']);
                }
                ?>

                <!-- Blog Posts -->
                <?php 
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 8;
                $offset = ($pageno - 1) * $no_of_records_per_page;

                $total_pages_sql = "SELECT COUNT(*) FROM tblposts WHERE CategoryId = '".$_SESSION['catid']."' AND Is_Active = 1";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                $query = mysqli_query($con, "SELECT tblposts.id AS pid, tblposts.PostTitle AS posttitle, tblposts.PostImage, tblcategory.CategoryName AS category, tblposts.PostDetails AS postdetails, tblposts.PostingDate AS postingdate FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId WHERE tblposts.CategoryId = '".$_SESSION['catid']."' AND tblposts.Is_Active = 1 ORDER BY tblposts.id DESC LIMIT $offset, $no_of_records_per_page");

                $rowcount = mysqli_num_rows($query);
                if ($rowcount == 0) {
                    echo "<h2>No records found</h2>";
                } else {
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                        <div class="card mb-4">
                            <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
                                <p><b>Category:</b> <?php echo htmlentities($row['category']); ?></p>
                                <a href="news-details.php?nid=<?php echo htmlentities($row['pid']); ?>" class="btn btn-primary btn-read-more">Read More &rarr;</a>
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
                    <li class="page-item <?php echo ($pageno <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($pageno <= 1) ? '#' : '?catid='.$_SESSION['catid'].'&pageno=1'; ?>">First</a>
                    </li>
                    <li class="page-item <?php echo ($pageno <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($pageno <= 1) ? '#' : '?catid='.$_SESSION['catid'].'&pageno='.($pageno - 1); ?>">Prev</a>
                    </li>
                    <li class="page-item <?php echo ($pageno >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($pageno >= $total_pages) ? '#' : '?catid='.$_SESSION['catid'].'&pageno='.($pageno + 1); ?>">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?catid=<?php echo $_SESSION['catid']; ?>&pageno=<?php echo $total_pages; ?>">Last</a>
                    </li>
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

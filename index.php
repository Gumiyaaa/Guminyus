<?php 
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Guminyus | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom CSS for additional styles -->
    <style>
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

        .card-body {
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }

        .card-body h2 {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-body p {
            font-size: 1rem;
            color: #6c757d;
        }

        .category-list {
            display: flex;
            flex-wrap: wrap;
        }

        .category-link {
            background-color: #f8f9fa;
            color: #343a40;
            padding: 4px 10px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 20px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
        }

        .category-link:hover {
            background-color: #343a40;
            color: white;
        }

        .card-footer {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .pagination .page-link {
            color: black;
        }

        .pagination .page-item.active .page-link {
            background-color: black;
            border-color: black;
        }

        /* Styles for search form */
        .form-control {
            border-radius: 20px;
            padding-right: 50px; /* Untuk memberikan ruang ekstra di sebelah kanan input field */
        }

        .btn-go {
            position: absolute;
            right: 10px; /* Menyesuaikan posisi tombol di sebelah kanan input field */
            top: 0;
            bottom: 0;
            margin: auto;
            border-radius: 0 20px 20px 0; /* Untuk membuat sudut tombol yang serasi dengan input field */
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            transition: all 0.3s ease-in-out;
        }

        .btn-go:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        
        /* Additional styling for card hover effect */
        .card {
            margin-bottom: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container mt-4">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                <?php 
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 8;
                $offset = ($pageno - 1) * $no_of_records_per_page;

                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                $query = mysqli_query($con, "SELECT tblposts.id AS pid, tblposts.PostTitle AS posttitle, tblposts.PostImage, tblcategory.CategoryName AS category, tblcategory.id AS cid, tblsubcategory.Subcategory AS subcategory, tblposts.PostDetails AS postdetails, tblposts.PostingDate AS postingdate, tblposts.PostUrl AS url FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId=tblposts.SubCategoryId WHERE tblposts.Is_Active=1 ORDER BY tblposts.id DESC LIMIT $offset, $no_of_records_per_page");
                while ($row = mysqli_fetch_array($query)) {
                ?>

                    <div class="card mb-4">
                        <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
                            <p class="mb-1"><b>Category:</b></p>
                            <div class="category-list">
                                <a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>" class="category-link"><?php echo htmlentities($row['category']); ?></a>
                            </div>
                            <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-read-more mt-3">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on <?php echo htmlentities($row['postingdate']); ?>
                        </div>
                    </div>
                <?php } ?>

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item <?php echo ($pageno <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($pageno <= 1) ? '#' : "?pageno=1"; ?>">First</a>
                    </li>
                    <li class="page-item <?php echo ($pageno <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($pageno <= 1) ? '#' : "?pageno=".($pageno - 1); ?>">Prev</a>
                    </li>
                    <li class="page-item <?php echo ($pageno >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="<?php echo ($pageno >= $total_pages) ? '#' : "?pageno=".($pageno + 1); ?>">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a>
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <?php include('includes/sidebar.php');?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

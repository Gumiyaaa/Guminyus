<?php 
session_start();
include('includes/config.php');

// Generating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

// Handling form submission
if(isset($_POST['submit'])) {
    // Verifying CSRF Token
    if (!empty($_POST['csrftoken']) && hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];
        $postid = intval($_GET['nid']);
        $st1 = '0';
        $query = mysqli_query($con, "INSERT INTO tblcomments(postId, name, email, comment, status) VALUES('$postid', '$name', '$email', '$comment', '$st1')");
        if($query) {
            echo "<script>alert('Comment successfully submitted. Comment will be displayed after admin review.');</script>";
            unset($_SESSION['token']);
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";  
        }
    }
}
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

    <!-- Custom styles for comment section -->
    <style>
        .card-post {
            margin-top: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: box-shadow 0.3s ease;
        }

        .card-post:hover {
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }

        .card-post-header {
            background-color: #17a2b8; /* Warna latar belakang header card */
            color: #fff; /* Warna teks pada header card */
            padding: 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-post-title {
            margin-top: 0;
            font-size: 28px;
        }

        .card-post-meta {
            font-size: 14px;
            color: #f8f9fa; /* Warna teks meta */
        }

        .card-post-body {
            padding: 20px;
        }

        .card-post-body img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .comment-section {
            margin-top: 30px;
        }

        .comment-box {
            background-color: #f8f9fa; /* Warna latar belakang kotak komentar */
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .comment-header {
            font-size: 18px;
            font-weight: bold;
            color: #333; /* Warna teks judul komentar */
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .comment-date {
            font-size: 12px;
            color: #777;
        }

        .comment-content {
            padding: 15px;
            line-height: 1.6;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <div class="row" style="margin-top: 4%">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                <?php
                $pid = intval($_GET['nid']);
                $query = mysqli_query($con, "SELECT tblposts.PostTitle AS posttitle,tblposts.PostImage,tblcategory.CategoryName AS category,tblcategory.id AS cid,tblsubcategory.Subcategory AS subcategory,tblposts.PostDetails AS postdetails,tblposts.PostingDate AS postingdate,tblposts.PostUrl AS url FROM tblposts LEFT JOIN tblcategory ON tblcategory.id=tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId=tblposts.SubCategoryId WHERE tblposts.id='$pid'");
                while ($row=mysqli_fetch_array($query)) {
                ?>
                <div class="card card-post mb-4">
                    <div class="card-post-header">
                        <h2 class="card-post-title"><?php echo htmlentities($row['posttitle']);?></h2>
                        <p class="card-post-meta"><b>Category:</b> <a href="category.php?catid=<?php echo htmlentities($row['cid'])?>" style="color: #f8f9fa;"><?php echo htmlentities($row['category']);?></a> |
                            <b>Sub Category:</b> <?php echo htmlentities($row['subcategory']);?> <b> Posted on </b><?php echo htmlentities($row['postingdate']);?></p>
                    </div>
                    <div class="card-post-body">
                        <img class="img-fluid rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
                        <p class="card-text mt-3"><?php echo (substr($row['postdetails'],0));?></p>
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- Sidebar Widgets Column -->
            <?php include('includes/sidebar.php');?>
        </div>
        <!-- /.row -->

        <!-- Comment Section -->
        <div class="row comment-section">
            <div class="col-md-8">
                <div class="card card-post my-4">
                    <h5 class="card-header" style="background-color: #343a40; color: #fff;">Leave a Comment:</h5>
                    <div class="card-body">
                        <form name="Comment" method="post">
                            <!-- CSRF Token -->
                            <input type="hidden" name="csrftoken" value="<?php echo isset($_SESSION['token']) ? htmlentities($_SESSION['token']) : ''; ?>" />
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter your valid email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Comment Display Section -->
                <?php 
                $sts = 1;
                $query = mysqli_query($con,"SELECT name, comment, postingDate FROM tblcomments WHERE postId='$pid' AND status='$sts'");
                while ($row=mysqli_fetch_array($query)) {
                ?>
                <div class="card comment-box">
                    <div class="card-body">
                        <div class="media">
                            <img class="d-flex mr-3 comment-avatar" src="images/usericon.png" alt="User Avatar">
                            <div class="media-body">
                                <h5 class="comment-header"><?php echo htmlentities($row['name']);?></h5>
                                <span class="comment-date"><?php echo htmlentities($row['postingDate']);?></span>
                                <p class="comment-content"><?php echo htmlentities($row['comment']);?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card shadow mb-4">
        <h5 class="card-header text-white" style="background-color: #343a40;">Search</h5>
        <div class="card-body">
            <form name="search" action="search.php" method="post">
                <div class="input-group">
                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Go!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card shadow mb-4">
        <h5 class="card-header text-white" style="background-color: #343a40;">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <?php
                        $query = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <li>&#8226; <a href="category.php?catid=<?php echo htmlentities($row['id'])?>" style="color: #343a40;"><?php echo htmlentities($row['CategoryName']);?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent News Widget -->
    <div class="card shadow mb-4">
        <h5 class="card-header text-white" style="background-color: #343a40;">Recent News</h5>
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <?php
                $query = mysqli_query($con, "SELECT tblposts.id AS pid, tblposts.PostTitle AS posttitle FROM tblposts LEFT JOIN tblcategory ON tblcategory.id = tblposts.CategoryId LEFT JOIN tblsubcategory ON tblsubcategory.SubCategoryId = tblposts.SubCategoryId ORDER BY tblposts.id DESC LIMIT 8");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <li>&#8226; <a href="news-details.php?nid=<?php echo htmlentities($row['pid'])?>" style="color: #343a40;"><?php echo htmlentities($row['posttitle']);?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

</div>



<?php include "./components/header.php"; ?>

<?php require_once("./db/db.php"); ?>

<body>

    <?php include "components/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->

                <?php 
                
                    $postSelect = "SELECT * FROM post";   

                    $postQuery = $connect -> query($postSelect);

                        while($row = $postQuery -> fetch_assoc()){  //Post array
                            
                            $postTitle = $row['post_title'];
                            $postAuthor = $row['post_author'];
                            $postDate = $row['post_date'];
                            $postImg = $row['post_img'];  // Post image
                            $postContent = $row['post_content']; ?>
                        
                            
                            <h2>
                                <a href="#"><?php echo $postTitle;?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $postAuthor;?></a>
                            </p>
                                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $postDate;?></p>
                            <hr>
                                <img class="img-responsive" src="<?php echo $postImg;?>" alt="">
                            <hr>
                                <p><?php echo $postContent;?></p>
                                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>

                        <?php } ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->

                <div class="well">


                <?php
                
                    $search = $_GET['search'];
                            
                    if(isset($_GET['submit'])){

                        $searchQuery = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";

                        $searchQuery = $connect -> query($searchQuery);

                        if(mysqli_num_rows($searchQuery) == 0){
                            echo "NO RESULT";
                        }else{
                            echo "SEARCH COMPLETE";
                        }

                    }

                ?>

                    <h4>Blog Search</h4>
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                            </div>
                        </form>   
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
        <?php include "./components/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
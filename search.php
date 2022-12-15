

<?php include "./components/header.php"; ?>

<?php require_once("./db/db.php"); ?>

<body>

    <?php include "components/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                
            <?php
                        
                    if(isset($_POST['submit'])){

                        $search = $_POST['search'];

                        $searchQuery = "SELECT * FROM `post` WHERE post_tags LIKE '%$search%'";

                        $searchQuery = $connect -> query($searchQuery);

                        $errorMessage = "";

                        if(mysqli_num_rows($searchQuery) == 0){
                            $errorMessage = "Ooops...Nothinng found!";
                        }else{   
                                while($row = $searchQuery -> fetch_assoc()){  //Post array
                                    
                                    $postTitle = $row['post_title'];
                                    $postAuthor = $row['post_author'];
                                    $postDate = $row['post_date'];
                                    $postImg = $row['post_image'];  // Post image
                                    $postContent = $row['post_content'];
                        ?>

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

                        <?php }
                        }
                        ?>

                    <?php }?> 
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->

                <div class="well">

                    <h4>Blog Search</h4>
                        <form method="post" action="search.php">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit" name="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                            </div>
                            <?php if(isset($errorMessage)){?>
                                <p class="text-danger"><?php echo $errorMessage;?></p>
                                <?php }?>
                        </form>   
                    <!-- /.input-group -->
                </div>

                <?php include "./components/categories.php";?>

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
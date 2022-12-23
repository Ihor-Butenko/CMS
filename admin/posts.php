<?php include "components/header.php";?>

<?php include "../db/db.php";?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "components/navigation.php" //Navigation include?>        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">

                            Welcome to the Admin!

                        </h1>

                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Dates</th>
                                </tr>
                            </thead>

                            <?php
        
                                $postSelection = "SELECT * FROM post";
                                $postQuery = $connect -> query($postSelection);         
                        
                            ?>

                            <tbody>

                                <?php
                                    while($row = $postQuery -> fetch_assoc()){
                            
                                        $postID = $row['post_id'];
                                        $postAuthor= $row['post_author'];
                                        $postTitle = $row['post_title'];
                                        $postCategory= $row['post_category_id'];
                                        $postStatus = $row['post_status'];
                                        $postImage = $row['post_image'];
                                        $postTags = $row['post_tags'];
                                        $postComments= $row['post_comment_count'];
                                        $postDate = $row['post_date'];
    
                                        echo "<tr>";
                                        echo "<th>$postID</th>";
                                        echo "<th>$postAuthor</th>";
                                        echo "<th>$postTitle</th>";
                                        echo "<th>$postCategory</th>";
                                        echo "<th>$postStatus</th>";
                                        echo "<th><img src=\"$postImage\" height=\"50px\"></th>";
                                        echo "<th>$postTags</th>";
                                        echo "<th>$postComments</th>";
                                        echo "<th>$postDate</th>";
                                        // echo "<th><a href='categories.php?delete=$categoryID'>Delete</a></th>";
                                        // echo "<th><a href='categories.php?update=$categoryID'>Upadate</a></th>";
                                        echo "</tr>";
                            
                                    }     
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        <!-- /#page-wrapper -->

<?php include "components/footer.php";?>
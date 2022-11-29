<?php
                            
                    if(isset($_GET['submit'])){

                        $search = $_GET['search'];

                        $searchError = "";

                        $searchRequest = "SELECT * FROM post WHERE post_tags LIKE '%$search%'";

                        $searchQuery = $connect -> query($searchRequest);

                        if(!$searchQuery or mysqli_num_rows($searchQuery) == 0){
                            $searchError = "Oooops! Not found... Plase try again";
                            // print_r($connect->error_list);
                        }else{
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
                        }

                    }

?>
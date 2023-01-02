<?php

    if(isset($_POST['add'])){
        
        $postTitle = $_POST['title'];
        $postCategoryID = $_POST['category'];
        $postAuthor = $_POST['author'];
        $postStatus = $_POST['status'];
        $postTags = $_POST['tags'];
        $postContent = $_POST['content'];

        $postImage = $_FILES['image']['name'];
        $postImageTemp = $_FILES['image']['tmp_name'];

        $postDate = date('Y-m-d');

        $postCommentCount = 4;

        move_uploaded_file($postImageTemp, "../image/$postImage");      

        $insertPostQuery = "INSERT INTO post(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ('$postCategoryID', '$postTitle', '$postAuthor', '$postDate', '$postImage', '$postContent', '$postTags', '$postCommentCount', '$postStatus')";

        $postInsert = $connect->query($insertPostQuery);

    }

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Post Category ID</label>
        <input type="text" class="form-control" name="category">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="status">
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
    </div>

    <button name="add">add</button>



</form>
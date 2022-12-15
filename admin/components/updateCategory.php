<?php
if (isset($_GET['update'])) {

    $categoryUpdateSelection = "SELECT * FROM categories WHERE category_id = $categoryID";
    $categoryUpdateQuery = $connect->query($categoryUpdateSelection);

    // $categoryInputSpawn = false;

    while ($row = $categoryUpdateQuery->fetch_assoc()) {

        $categoryName = $row['category_name'];
        $categoryID = $row['category_id'];

        // $categoryInputSpawn = true;
?>

        <form action="" method="post">
        <input type="text" class="form-control" name="categories_update" value="<?php if (isset($categoryName)) {
                                                                                    echo $categoryName;
                                                                                } ?>">
        <input class="btn btn-primary" type="submit" name="update_submit" value="Update" id="update">
        </form>
    <?php } ?>


<?php } ?>

<?php

// print_r($_POST);
// print_r($_GET);

if (isset($_GET['update']) && isset($_POST['categories_update'])) {

    $categoryUpdateTitle = $_POST['categories_update'];

    $categoryId = $_GET['update'];

    $updateSQL = "UPDATE categories SET category_name = \"$categoryUpdateTitle\" WHERE category_id = $categoryId";
    $updateQuery = $connect->query($updateSQL);

    if (!$updateQuery) {
        printf("Error message: %s\n", $connect->error);
    }

    if($updateQuery){
        header("Location: ./categories.php");
    }


    // echo "Hello Wrold!";


}

?>
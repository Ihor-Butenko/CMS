<?php
    function deleteCategories(){

        global $connect, $deleteQuery;

        if(isset($_GET['delete'])){
                                                    
            $categoryId = $_GET['delete'];

            $deleteSQL = "DELETE FROM categories WHERE category_id = $categoryId";
            $deleteQuery = $connect -> query($deleteSQL);

            header("Location: categories.php");

        }
    }
?>
<?php
    function findCategories() {

        global $categoryQuery;

        while($row = $categoryQuery -> fetch_assoc()){
                            
            $categoryName = $row['category_name'];
            $categoryID = $row['category_id'];
            echo "<tr>";
            echo "<th>$categoryName</th>";
            echo "<th>$categoryID</th>";
            echo "<th><a href='categories.php?delete=$categoryID'>Delete</a></th>";
            echo "<th><a href='categories.php?update=$categoryID'>Upadate</a></th>";
            echo "</tr>";

        } 
    }
?>
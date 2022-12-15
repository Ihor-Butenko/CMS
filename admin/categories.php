<?php include "components/header.php"?>
<?php include "../db/db.php"?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "components/navigation.php"?>        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the admin!
                            <!-- <small>Subheading</small> -->
                        </h1>
                            <div class="col-xs-6">

                                <?php 

                                    if(isset($_POST['submit'])){
                                        $categoryField = $_POST['categories_title'];

                                        $errorMessage = "";
                            
                                        if(!$categoryField || empty($categoryField)){
                                            $errorMessage = "<p class='text-danger'>Ooops...Please fill all fields!</p>";
                                        }else{
                                            $insertCategories = "INSERT INTO categories(category_name) VALUE ('$categoryField')";

                                            $request = $connect -> query($insertCategories);
                                        }
                                    }
                                
                                ?>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for=".form-control">Add category: </label>
                                        <input type="text" class="form-control" name="categories_title">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add">

                                        <?php
                                            if(isset($_GET['update'])){
                                                $categoryID = $_GET['update'];

                                                include "./components/updateCategory.php";
        
                                            }
                                        ?>

                
                                    </div>
                                </form>
                                
                            </div>

                            <div class="col-xs-6">
                                <?php
                                    $categorySelection = "SELECT * FROM categories";
                                    $categoryQuery = $connect -> query($categorySelection);         
                                ?>
                                <table class="table table-bord table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
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
                                            ?>

                                            <?php
                                            
                                                if(isset($_GET['delete'])){
                                                    
                                                    $categoryId = $_GET['delete'];

                                                    $deleteSQL = "DELETE FROM categories WHERE category_id = $categoryId";
                                                    $deleteQuery = $connect -> query($deleteSQL);

                                                    header("Location: categories.php");

                                                }

                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "components/footer.php";?>
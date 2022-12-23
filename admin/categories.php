<?php include "components/header.php";?>

<?php include "../db/db.php";?>

<?php include "./functions/insertCategories.php";?>
<?php include "./functions/findCategories.php";?>
<?php include "./functions/deleteCategories.php";?>


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
                            Welcome to the admin!
                            <!-- <small>Subheading</small> -->
                        </h1>
                            <div class="col-xs-6">

                                <?php insertCategories(); //Insert categories?>

                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for=".form-control">Add category: </label>
                                        <input type="text" class="form-control" name="categories_title">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add">

                                        <?php //Get category id and include
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
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Category title</th>
                                            <th>ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php findCategories();?>

                                        <?php deleteCategories();?>
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
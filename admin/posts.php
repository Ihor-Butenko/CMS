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

                        <?php
                        
                            if(isset($_GET['source'])){
                                $source = $_GET['source'];
                            }else{
                                $source = null;
                            }

                            switch($source){
                                
                                case "addPost";
                                include "./components/addPost.php";
                                break;

                                default: 
                                include "./components/viewAllPosts.php";
                                break;

                            }   

                        ?>

                    </div>
                </div>

            </div>
        </div>
        <!-- /#page-wrapper -->

<?php include "components/footer.php";?>
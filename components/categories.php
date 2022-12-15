<div class="well">
        <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6"> 
                    <ul class="list-unstyled">
                    <?php
    
                        $categorySelection = "SELECT * FROM categories LIMIT 4";
                        $categoryQuery = $connect -> query($categorySelection);
                        while($row = $categoryQuery -> fetch_assoc()){
        
                            $categoryName = $row['category_name'];
                            echo "<li><a href='#'>$categoryName</a></li>";

                        }

                    ?>          
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                        <li><a href="#">Category Name</a>
                        </li>
                         <li><a href="#">Category Name</a>
                        </li>
                    </ul>
                </div>
            </div>
</div>
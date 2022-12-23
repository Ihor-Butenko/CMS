<?php
function insertCategories(){

    global $connect, $request, $errorMessage;

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
}
?>
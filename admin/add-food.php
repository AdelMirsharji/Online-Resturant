<?php include('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1> Add Food </h1>

        <br/>

        <?php
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br/><br/>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" placeholder="Enter Food title"></td>
            </tr>

            <tr>
                <td>Description</td>
                <td><textarea name="description" cols="30" rows="5" placeholder="Description of food"></textarea></td>
            </tr>


            <tr>
                <td>Price</td>
                <td><input type="number" name="price"></td>
            </tr>

            <tr>
                <td>Select Image</td>
                <td><input type="file" name="image"></td>
            </tr>

            <tr> 
                <td>Featured</td>
                <td><input type="radio" name="featured" value="Yes"> Yes
                    <input type="radio" name="featured" value="No"> No
                </td>
            </tr>

            <tr> 
                <td>Active</td>
                <td><input type="radio" name="active" value="Yes"> Yes
                    <input type="radio" name="active" value="No"> No
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>
            </tr>

        </table>

    </div>

</div>


<?php include('partials/socials.php'); ?>

<?php
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price']; 
        
        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }
        else{
            $featured = "No";
        }

        if(isset($_POST['active'])){
            $featured = $_POST['active'];
        }
        else{
            $featured = "No";
        }

        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];

            if($image_name != ""){
                $ext = end(explode('.', $image_name));
                $image_name = "Food-Name".rand(0000,9999).".".$ext;
                $src = $_FILES['image']['tmp_name'];
                $dst = "../images/food/".$image_name;
                $upload = move_uploaded_file($src, $dst);

                if($upload == FALSE){

                    $_SESSION['upload'] = "Failed to upload image";
                    header('location'.SITEURL.'admin/add-food.php');

                    die();
                }
            }
        }
        else{
            $image_name = "";
        }
        
        $sql = "INSERT INTO tbl_food SET title = '$title' , description = '$description' , price= $price, image_name= '$image_name', featured= '$featured', active= '$active'";
        $result = mysqli_query($conn, $sql) or die(mysqli_errno($conn));

        if($result==TRUE){
            $_SESSION['add'] = "Food added successfully!";
            header("location:".SITEURL.'admin/manage-food.php');
        }
        else{
            $_SESSION['add'] = "Failed to add Food!";
            header("location:".SITEURL.'admin/add-food.php');
        }
    }

?>
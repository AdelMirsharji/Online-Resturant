<?php include('partials/menu.php') ?>


        <!-- Main Content Section Starts--->
        <div class="main-content">
            <div class="wrapper">
                <h1> Manage Food </h1>
                <br/>

                <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                ?>

                <br/><br/>
                <!-- Button to add admin -->
                <a href="add-food.php" class="btn-primary">Add  Food</a>
                <br/><br/>

                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                <?php
                    $sql = 'SELECT * FROM tbl_food';
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE){
                        $count = mysqli_num_rows($res);

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $title=$rows['title'];
                                $price=$rows['price'];
                                $image_name=$rows['image_name'];
                                $featured=$rows['featured'];
                                $active=$rows['active'];


                            ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td>
                                        <?php
                                            if($image_name==""){
                                                echo "No image added for this food!";
                                            }
                                            else{
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" width=100px>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="#" class="btn-secondary">Update Food</a>
                                        <a href="#" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>
                            <?php

                            }
                        }
                        else{
                            echo "No Food In Database!";
                        }
                        
                    }
                ?>

                </table>

                <div class="clearfix"></div>

            </div>
        </div>
        
    </body>



<?php include('partials/socials.php') ?>
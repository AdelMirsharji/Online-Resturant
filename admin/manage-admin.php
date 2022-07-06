<?php include('partials/menu.php') ?>


        <!-- Main Content Section Starts--->
    <div class="main-content">
        <div class="wrapper">
            <h1> Manage Admin </h1>

            <br/>

            <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>
            
            <br/><br/>
            <!-- Button to add admin -->
            <a href="add-admin.php" class="btn-primary">Add  Admin</a>
            <br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>Serial Number</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>

                <?php
                    $sql = 'SELECT * FROM tbl_admin';
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE){
                        $count = mysqli_num_rows($res);

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                            ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="#" class="btn-secondary">Update Admin</a>
                                        <a href="#" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>
                            <?php

                            }
                        }
                        else{

                        }
                        
                    }
                ?>
            </table>

            <div class="clearfix"></div>
        </div>
    </div>


<?php include('partials/socials.php') ?>
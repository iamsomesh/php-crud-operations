<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Edit</title>
        
    </head>
    <body>
        <?php
            session_start();
            include './config/database.php';
            $id = $_GET['id'];
            $details = "SELECT * from user_db where user_id='$id'";
            $d_result = $conn->query($details);
            $details_result = $d_result->fetch_assoc();
            $email = $details_result['user_email'];
            $name = $details_result['user_name'];
            $pass = $details_result['user_password'];
            
        ?>
        <form method="post"  target="_self" class="border-class" id="editUser">
            <h1>Update details</h1>
            <div class="form-group row ">
                <label for="email" class="col-sm-2 col-form-label">Email:</label><br>
                <div class="col-sm-10">
                    <input class="form-control" type="email" value=<?php echo $email; ?>  name="update_email" placeholder="" ><br>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name:</label><br>
                <div class="col-sm-10">   
                    <input class="form-control" type="text" value=<?php echo $name;?>  name="update_name" placeholder="" ><br>
                </div>
            </div>
            <div class="form-group row"> 
                <label for="password" class="col-sm-2 col-form-label">Password:</label><br>
                <div class="col-sm-10">
                    <input class="form-control" type="password" value=<?php echo $pass; ?>  name="update_pass" placeholder=""><br>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                </div>
            </div>
            <?php
               include "./config/database.php";
               if(isset($_POST['update'])){
                    $id = $_GET['id'];
                    $update_email = $_POST['update_email'];
                    $update_pass = $_POST['update_pass'];
                    $update_name = $_POST['update_name'];
       
                    if(empty($update_email)){
                        echo "<h6>Email is required</h6>";
                            
                    }else if(empty($update_name)){
                        echo "<h6>Name is required</h6>";
                            
                    }else if(empty($update_pass)){
                        echo "<h6>Password is required</h6>";
                            
                    }else{
                            
                        $update = "UPDATE user_db SET user_email = '$update_email', user_name = '$update_name', user_password = '$update_pass' WHERE user_id = $id";
                        if ($conn->query($update)=== TRUE) {
                            echo "Succcess";
                            header('Location: dashboard.php'); 
                            exit();
                        } else {
                            echo "Error updating record";
                        }
                    }
                }else{
                        
                }
            
            ?>
           
        </form>
         
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title></title>
    </head>
    <body>
        <!-- create login form -->
            <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card bg-white mt-5">
                        <div class="card-title text-white mt-5">
                        <h3 class="text-center py-3" style=color:black;>Login Form </h3>
                        <hr>
                        </div>
                        <div class="card-body">
                        <form action="" method="post">
                        <div class="form-group">
                         <label for="email">Email address</label>
                         <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">     
                        </div>
                        <div class="form-group">
                          <label for="pass">Password</label>
                          <input type="password" class="form-control" id="pass" name="password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                            <!-- checking given email and password are valid or not -->
                                <?php 
                                    session_start();
                                    if(isset($_POST['login']))
                                    { 
                                        if(empty($_POST['email']) || empty($_POST['password']))
                                        {
                                            echo "<h6>Enter email id and password</h6>";
                                        }
                                        else
                                        {   
                                            // include database.php file in which all database create connection 
                                            include './config/database.php';
                                            $email = $_POST['email'];
                                            $password = $_POST['password'];
                                            // apply select query where my databse name is user_db
                                            $query="SELECT * from user_db where user_email='".$email."' and user_password='".$password."'";
                                            $result=mysqli_query($conn,$query);
                                            if ($result->num_rows > 0) 
                                            {
                                                // fetch username id email from database
                                                $row = mysqli_fetch_assoc($result);
                                                $_SESSION['name'] = $row['user_name'];
                                                $_SESSION['id'] = $row['user_id'];
                                                $_SESSION['sEmail'] = $row['user_email'];
                                                $_SESSION['email'] = $_POST['user_email'];
                                                header("location:dashboard.php");
                                            }
                                            else
                                            {
                                                echo "<h6>Invalid Email and Password</h6>";
                                            }
                                        }
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

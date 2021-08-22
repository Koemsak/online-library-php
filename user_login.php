<?php include_once('partial/header.php');?>

<?php
    require_once('database/database.php');
    $messageError = "";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $isValid = verifyUser($_POST);
        session_start();
        $_SESSION['username'] = $_POST['username'];
        if($isValid) {
            header("Location: http://localhost/online-library-php/?page=home");
        } else {
            $messageError = "Incorrect password or username";
        }
        
    }
    
?>
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 m-auto">
                <div class="logo text-center mb-3">
                    <h2 class="text-danger"><span class="text-white">Book <i class="fa fa-book"></i> Online</span> Library</h2>
                </div>
                <form action="" method="POST" class="p-4 border border-light rounded">
                    <h2 class="text-white text-center">Login</h2>
                    <hr class="bg-white">
                    <p class="text-danger text-center"><?= $messageError ?></p>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold text-white">Username</label>
                        <input type="text" class="form-control" id="name" placeholder="Username" name="username" required>
         
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold text-white">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                 
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mb-4 mt-4 form-control">Login</button>       
                        <p class="text-white">Don't have an account yet? <a href="user_singup.php" class="font-weight-bold text-light">Register</a></p>     
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
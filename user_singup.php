
<?php include_once('partial/header.php');?>

<?php
    require_once('database/database.php');
    $message_error = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        $isCreate = createUser($_POST);
        if($isCreate) {
            header("Location: http://localhost/online-library/?page=home");
        } else {
            $message_error = "This email already exist, or image file must be JPG JPEG PNG";
        }
    }
?>
    <div class="container p-5">
        <div class="row">
            <div class="col-sm-6 m-auto">
                <div class="logo text-center mb-3">
                    <h2 class="text-danger"><span class="text-white">Book <i class="fa fa-book"></i> Online</span> Library</h2>
                </div>
                <form action="" method="POST" class="p-4 border border-light rounded" enctype="multipart/form-data">
                    <h2 class="text-white text-center">Register</h2>
                    <hr class="bg-white">
                    <p class="text-danger text-center"><?=$message_error ?></p>
                    <div class="form-group">
                        <label for="firstName" class="font-weight-bold text-white">Username</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-white">Profile</label>
                        <input type="file" class="form-control" name="profile" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold text-white">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Emal" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold text-white">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mb-4 mt-4 form-control">Register</button>       
                        <p class="text-white">Already a member? <a href="user_login.php" class="font-weight-bold text-light">Login</a></p>     
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